<?php

// It translates the interface of one class into soma other interface
// Protoct the client code to change (SOLID Open-Close principle)

class Facebook
{
    public function postToWall($msg)
    {
        echo 'Posting message: ' . $msg . PHP_EOL;
    }
}

interface SocialMediaAdapterInterface
{
    public function post($msg);
}

class FacebookAdapter implements SocialMediaAdapterInterface
{
    private $facebook;

    public function __construct($facebook)
    {
        $this->facebook = $facebook;
    }

    public function post($msg)
    {
        $this->facebook->postToWall($msg);
    }
}

function getMessageFromUser() {
    return 'User msg';
}


$facebookAdapter = new FacebookAdapter(new Facebook());

$msg = getMessageFromUser();
//...

$facebookAdapter->post($msg);