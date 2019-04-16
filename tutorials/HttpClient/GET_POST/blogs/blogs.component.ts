import { Component, OnInit } from '@angular/core';
import { BlogsService } from '../blogs.service';
import { Blogpost } from '../blogpost';

@Component({
  selector: 'app-blogs',
  templateUrl: './blogs.component.html',
  styleUrls: ['./blogs.component.css']
})
export class BlogsComponent implements OnInit {

  posts: Blogpost[];

  blogpost = new Blogpost();

  error: string;

  showPostForm = false;

  constructor(private blogservice: BlogsService) { }

  ngOnInit() {
    this.blogservice.getBlogPosts().subscribe(
      (data: Blogpost[]) => this.posts = data,
      error => this.error = error
    );
  }

  showFormPage(){
    this.showPostForm = true;
  }

  onSubmit() {
    this.showPostForm = false;
    return this.blogservice.createPost(this.blogpost).subscribe(
        data => this.posts.push(data),
        error => this.error = error
      );
  }
}