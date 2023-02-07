<?php 

// REQUIRES

require "models/User.php";
require "models/Post.php";
require "models/PostCategory.php";

// BRING BACK USER BY EMAIL //

function loadUser(string $email) : User
{
    $db = new PDO(
    "mysql:host=db.3wa.io;port=3306;dbname=davidsim_phpj8",
    "davidsim",
    "83c8b946aee433563583381d62aa9c15"
    );
    
    
        $query = $db->prepare('SELECT * FROM users WHERE email = :email');
        
        $parameters = ['email' => $email];
        
        $query->execute($parameters);

        $userByEmail = $query->fetch(PDO::FETCH_ASSOC);
        
        $newUserByEmail = new User($userByEmail["first_name"], $userByEmail["last_name"], $userByEmail["email"], $userByEmail["password"],);
        
        $newUserByEmail->setId($userByEmail["id"]);
        
        return $newUserByEmail;
        
}

// BRING BACK POST BY TITLE //

function loadPost(string $title) : Post
{
    
    $db = new PDO(
    "mysql:host=db.3wa.io;port=3306;dbname=davidsim_phpj8",
    "davidsim",
    "83c8b946aee433563583381d62aa9c15"
    );
    
    $query = $db->prepare('SELECT * FROM posts WHERE title = :title');
        
    $parameters = ['title' => $title];
        
    $query->execute($parameters);

    $postByTitle = $query->fetch(PDO::FETCH_ASSOC);
        
    $newPostByTitle = new Post($postByTitle["title"], $postByTitle["content"], $postByTitle["author"], $postByTitle["category"]);
        
    $newPostByTitle->setId($postByTitle["id"]);
        
    return $newPostByTitle;
    
}

$newPost = new Post("SNK", "C'est du looouurrd!", "Antho", "Manga");
echo $newPost;

// SAVE A USER

function saveUser(User $user) : User
{
    
    $db = new PDO(
    "mysql:host=db.3wa.io;port=3306;dbname=davidsim_phpj8",
    "davidsim",
    "83c8b946aee433563583381d62aa9c15"
    );
    
    $query = $db->prepare('INSERT INTO users VALUES(null, :first_name, :last_name, :email, :password)');

    $parameters = [
        'first_name' => $user->getFirstName(),
        'last_name' => $user->getLastName(),
        'email' => $user->getEmail(),
        'password' => $user->getPassword()
    ];
    
    $query->execute($parameters);
    
    return loadUser($user->getEmail());
    echo "User saved !";
}



?>