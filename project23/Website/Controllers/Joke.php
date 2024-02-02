<?php 
namespace Website\Controllers;
class Joke {

    private $authorsTable;
    private $jokesTable;
    public function __construct(\Ninja\DatabaseTable $jokesTable, \Ninja\DatabaseTable $authorsTable) {
        $this->jokesTable = $jokesTable;
        $this->authorsTable = $authorsTable;
    }
    public function home() {
        $title = 'Jokes portal';

        return ['template' => 'home.html.php', 
        'title' => $title,
        'variables' =>[]
        ];
    }

    public function delete() {
        $this->jokesTable->delete('id', $_POST['id']);
        header('Location: index.php?action=list');
        //header('Location: /joke/list');
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

        return ['template' => 'jokelist.html.php', 
        'title' => $title, 
        'variables' => [
            'totalJokes' => $totalJokes,
            'jokes' => $jokes
        ]
    ];
    }

    public function edit($id = null) {
        if (isset($_POST['joke'])) {
            $joke = $_POST['joke'];
            $joke['jokedate'] = new \DateTime();
            $joke['authorid'] = 3;

            $this->jokesTable->save($joke);

            header('Location: /joke/list');
        }
        else {
            if(isset($id)) {
               $joke = $this->jokesTable->find('id', $id)[0];

            }
            else {
                $joke = null;
            }
            $title = 'Edit Joke';

            return ['template' => 'editjoke.html.php', 'title' => $title, 'variables' => 
    [
        'joke' => $joke
    ]
];
        }
    }
    
}