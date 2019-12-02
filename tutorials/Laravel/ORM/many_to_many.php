Many To Many

https://quickadminpanel.com/blog/eloquent-relationships-the-ultimate-guide/
<?php

Posts and Categories. So each post can have one or more category, and each category can have one or more posts.

------(posts)-----
id | title

--------(category_post)------
category_id | post_id

--------(categories)---------
id  | name

class Post extends Model
{
    function categories() {
        return $this->belongsToMany('App\Category');
    }
}


class Category extends Model
{
    function posts() {
        return $this->belongsToMany('App\Post');
    }
}


And then we can do this “magic”:

$post = Post::find(1);

foreach ($post->categories as $category) {
    echo $category->title;
}
Or this:

$categories = Post::find(1)->categories()->orderBy('title')->get();
Have you noticed we don’t specify any fields or table names? By default, Laravel makes a few assumptions:

# Creating / editing data with pivot tables
Ok, so we have a many-to-many structure, now if we need to add a category to the post, we need to add an entry to the pivot table with category_id and post_id, right? Well, Eloquent takes care of it, all we need to write is this:

$post = Post::find(1);
$post->categories()->attach($category_id);

And that’s it – function attach() accept the ID and saves the data.
A convenient thing is that you can pass one ID, or array of IDs:

$post->categories()->attach([1,2,3]);

Now, if we need to remove the category, it’s also simple – with detach() function:

$post->categories()->detach($category_id);
$post->categories()->detach([1,2,3]);

Or remove all categories, then just don’t pass any parameter:

$post->categories()->detach();


Another great function is sync(). Imagine that you need to save the post and user removed checkboxes from some categories, and ticked other categories – now you need to check all of them and delete some entries? No, just pass the array of final result to sync() and Eloquent will take care of it:

$post->categories()->attach([1,2,3]);
// Now post has categories 1,2,3

$post->categories()->detach([2]);
// Now post has categories 1,3

$post->categories()->sync([1,2]);
// Now post has categories 1,2

$post->categories()->syncWithoutDetaching([1,2]);
// Won't detach ID 3 from the past example







?>