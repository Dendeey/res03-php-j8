<?php

class PostCategory
{
    private int $id;
    private string $name;
    private string $description;
    private array $posts;
    
    public function __construct(string $title, string $content, User $author, PostCategory $category)
    {
        $this->id = -1;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->category = $category;
        
    }
    
    // PUBLIC GETTERS //
    
    public function getId() : int
    {
        return $this->id;
    }
    
    public function getName() : string
    {
        return $this->name;
    }
    
    public function getDescription() : string
    {
        return $this->description;
    }
    
    public function getPosts() : array
    {
        return $this->posts;
    }
    

    
    // PUBLIC SETTERS //
    
    
    public function setId(int $id) : void
    {
        $this->id = $id;
    }
    
    public function setName(string $name) : void
    {
        $this->name = $name;
    }
    
    public function setDescription(string $description) : void
    {
        $this->description = $description;
    }
    
    public function setPosts(array $posts) : void
    {
        $this->posts = $posts;
    }
    
    // METHODES //
    
    public function addPost(Post $post) : array
    {
        
        array_push($this->posts, $post);
        
        return $this->posts;
        
    }
    
    public function removePost(Post $post) : array
    {
        
        $rmvPost = array_search($post, $this->posts);
        
        unset($this->posts[$rmvPost]);
        
        return $this-posts;
        
    }
    
}


?>