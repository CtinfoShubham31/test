Http Client - Get and Post Request
<?php 
Firstly import HttpClient in "app.module.ts"
lo
We r taking here the example of blog. For this we will generate class blogpost.
=> ng generate class blogpost

And fields of the class are:
!!!!!!!(blogpost.ts)!!!!!!
export class Blogpost {
    id:number;
    title:string;
    description:string;
    author:string;
}

Now generate service, "ng g service blogs" i.e. "blogs.service.ts"


# For error handling, we will import 
import { HttpErrorResponse } from '@angular/common/http';
import { throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';

in "blogs.service.ts" file.


serverUrl = 'http://localhost/ang6/';

# Final Code:
!!!!!!!!!!!(app.component.html)!!!!!!!!!!!!!!!
<app-blogs></app-blogs>
<router-outlet></router-outlet>


!!!!!!!!!!!!!(blogs.service.ts)!!!!!!!!!!!!!!!!

import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { HttpErrorResponse } from '@angular/common/http';
import { throwError } from 'rxjs';
import { catchError } from 'rxjs/operators';
import { Blogpost } from './blogpost';

@Injectable({
  providedIn: 'root'
})
export class BlogsService {

  serverUrl = 'http://localhost/ang6/';

  httpOptions = {
    headers: new HttpHeaders({ 'Content-Type': 'application/json' })
  };

  constructor(private http: HttpClient) { }

  getBlogPosts() {
    return this.http.get<Blogpost[]>(this.serverUrl + 'blogs/posts')
    .pipe(
      catchError(this.handleError)
    );
  }

  createPost (blogpost: Blogpost) {
    return this.http.post<Blogpost>(this.serverUrl + 'blogs/createPost', blogpost, this.httpOptions)
    .pipe(
      catchError(this.handleError)
    );
  }

  private handleError(error: HttpErrorResponse) {
    if (error.error instanceof ErrorEvent) {
      // A client-side or network error occurred. Handle it accordingly.
      console.error('An error occurred:', error.error.message);
    } else {
      // The backend returned an unsuccessful response code.
      // The response body may contain clues as to what went wrong,
      console.error(`Backend returned code ${error.status}, ` + `body was: ${error.error}`);
    }
    // return an observable with a user-facing error message
    return throwError('Something bad happened; please try again later.');
  }
}

!!!!!!!!!!!!!(blogs.component.ts)!!!!!!!!!!!!!!!!

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

!!!!!!!!!!!!!(blogs.component.html)!!!!!!!!!!!!!!!!

<div class="container">
  <div class="blogs" [hidden]="showPostForm">
    <div class="content-top">
      <div class="blog-heading">
          <h1>Blogs</h1>
      </div>
      <div class="blog-create-btn">
          <!-- <button (click)="showPostForm=true;postForm.reset()">Create Post</button> -->
          <button (click)="showFormPage()">Create Post</button>
      </div>
    </div>
    <div *ngFor="let post of posts" class="posts">
      <h2 class="post-title">{{post.title}}</h2>
      <div class="post-date">
        <span>Author: {{post.author}}</span><br />
        Posted On: {{post.created_at | date:'medium'}} 
      </div>
      <div class="post-desc">{{post.description}}</div>
    </div>
  </div>
  <div class="post-form" [hidden]="!showPostForm">
      <h2>Create Post</h2>
      <form (ngSubmit)="onSubmit()" #postForm="ngForm">
        <div class="form-group">
          <label for="title">Title: </label>
          <input type="text" name="title" id="title" [(ngModel)]="blogpost.title" required>
        </div>
        <div class="form-group">
            <label for="author">Author: </label>
            <input type="text" name="author" id="author" [(ngModel)]="blogpost.author" required>
          </div>
        <div class="form-group">
          <label for="description">Description: </label>
          <textarea name="description" id="description" [(ngModel)]="blogpost.description" rows="8"></textarea>
        </div>
        <div class="form-group"> <label>&nbsp;</label>
          <button type="submit" [disabled]="!postForm.form.valid">Add Post</button>
        </div>
      </form>
    </div>
  {{error}}
</div>








?>