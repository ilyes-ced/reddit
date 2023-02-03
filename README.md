# reddit clone ( an attempt )
Laravel, Livewire, TailwindCSS, MySql, Jquery
incomplete

first project so a lot of glitches and bad practices

## Features
- authentication
- create subs and posts
- text and images and multi images posts
- upvote, downvote
- comment and sub comments
- upvote downvote comments
- bookmarks
- join and leave subs
- load more posts on sccroll

## Screenshots
|   |   |
|---|---|
![](images/main_page.png)  |  ![](images/main_page2.png)
![](images/create_post.png)  |  ![](images/create_images_post.png)
![](images/profile_page.png)  |  ![](images/post.png)





## Installation

install packages
```
npm install
composer install
```

create .env from .env.example and change info of mysql database

migrate and seed
```
php artisan migrate && php artisan db:seed
```

created accounts

email             |  password
:-------------------------:|:-------------------------:
alex@gmail.com  |  password
james@gmail.com  |  password
tomas@gmail.com  |  password


to run 
```
npm run dev
php artisan serve
```