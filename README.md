# Posts App
## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)

## General info
#### This project is simple Posts app that: 
* Allow has two main accounts (admin and user)
* Admin to access all posts of all users
* On the other hand, every user can create,edit,delete or show details of his post/posts.
* It Includes two API Endpoints   
     
    * To list all posts if user is admin.
    * List user posts' only if customar is normal user.
* #### Views:
    * Signup
    * Login
    * Submit post
    * Edit post
    * List post
    * Show post details
    * dashboard 
## Technologies
Project is created with:
* PHP: 8.0.13
* Laravel: 9x


## Setup
To run this project, install it locally using commands below:

```
$ composer install
$ cp .env.example .env
$ php artisan key:generate
$ php artisan migrate
$ php artisan serve

```

## API Reference

#### Register user

```http
  POST /api/register
```

| Parameter | Type     | Description                |
| :-------- | :------- | :------------------------- |
| `name` | `string` | **Required,string,min:3,max:200**|
| `email` | `string` | **Required,string,confirmed,min:6**|
| `password` | `string` | **Required,unique,email,string**|
| `phone` | `string` | **Required,required,string,max:13**|

#### login user

```http
  POST /api/login
```

| Parameter | Type     | Description                       |
| :-------- | :------- | :-------------------------------- |
| `email` | `string` | **Required,string,confirmed,min:6**|
| `password` | `string` | **Required,unique,email,string**|

#### Get all items

```http
  GET /api/posts
```

#### Logout user

```http
  POST /api/logout
```



