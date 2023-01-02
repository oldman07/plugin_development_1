<?php
defined('ABSPATH') || die('nice try');

$posts = wp_remote_retrieve_body( wp_remote_get('https://jsonplaceholder.typicode.com/posts') );
// $post = wp_remote_retrieve_body( wp_remote_post('https://jsonplaceholder.typicode.com/posts',
// [
//     'body'=>[
//         'title' => "this is post title",
//         'body' => 'this is body',
//         'userId' => 10

//     ],
// ]) );
$posts = json_decode($posts);
// print_r($post);
?>
<table class="widefat fixed striped">
    <thead>
        <tr>
            <th> ID</th>
            <th> Image</th>
            <th>Name</th>
            <th> Company</th>
            <th>Location</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($posts as $post): ?>
        <tr>
            <td><?php echo $post->id; ?></td>
            <td><?php echo $post->userId;  ?></td>
            <td><?php echo $post->title; ?></td>
            <td><?php echo $post->body; ?></td>
           
        </tr>
        <?php endforeach; ?>
</tbody>
</table>