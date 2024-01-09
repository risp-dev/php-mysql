<?php 

class JokeController {
    public function __construct(private DatabaseTable $jokesTable, private DatabaseTable $authorsTable) {
    }
    public function home() {
        $title = 'Jokes portal';

        ob_start();
        include __DIR__ . '/../templates/home.html.php';

        $output = ob_get_clean();

        return ['output' => $output, 'title' => $title];
    }

    public function delete() {
        $this->jokesTable->delete('id', $_POST['id']);
        header('Location: jokes.php');
    }

    public function list() {
        $result = $this->jokesTable->findAll();

        $jokes = [];
        foreach($result as $joke){
            $author = $this->authorsTable->find('id', $joke['authorid'])[0];

            $jokes[] = [
                'id' => $joke['id'],
                'joketext' => $joke['joketext'],
                'jokedate' => $joke['jokedate'],
                'name' => $author['name'],
                'email' => $author['email']
            ];
        }
        $title = 'Joke list';

        $totalJokes = $this->jokesTable->total();

        ob_start();
        include __DIR__ . '/../templates/jokelist.html.php';

        $output = ob_get_clean();

        return ['output' => $output, 'title' => $title];
    }

    public function edit() {
        if (isset($_POST['joke'])) {
            $joke = $_POST['joke'];
            $joke['jokedate'] = new DateTime();
            $joke['authorid'] = 3;

            $this->jokesTable->save($joke);

            header('Location: jokes.php');
        }
        else {
            if(isset($_GET['id'])) {
                $joke = find($pdo, 'joke', 'id', $_GET['id'])[0] ?? null;
            }
            else {
                $joke = null;
            }
            $title = 'Edit Joke';

            ob_start();
            include __DIR__ .'/../templates/editjoke.html.php';
            $output = ob_get_clean();

            return ['output' => $output, 'title' => $title];
        }
    }
    
}