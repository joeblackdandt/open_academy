## About
This is just an attemp of creating a very simple LMS to play with the creation of custom post types and custom taxonomies.

## Lessons and Courses
The way everything is organized is with Lessons as a custom post type and Courses as a taxonomy that only applies to posts of type Lesson. When you create a new Lesson, you can just select to which course(s) it belongs to.

This provides a structure of Lessons grouped in Courses.

## Registration for Courses
Registration or Enrolling in Courses is possible with the creation of a custom Field in the user profile. A list of the available taxonomies of type Course is shown to every user in its profile. A checkbox determines if that user is enrolled in that course.

## Roles and Capabilities
Ideally, a custom role for student and teacher should be created, setting the capabilities in a way that only teachers can create courses and lessons. Students shouldnt be able to get into the backend. At the moment this is not done.

## Installing Wordpress

1) Install WP-CLI by following: 
> http://wp-cli.org/

2) Download wordpress
> wp core download

3) Generate DB
> wp core config --dbname=c9 --dbuser=username --dbpass={YOUR DATABASE PASSWORD}

4) Create database
> wp db create

5) Install wordpress
> wp core install --url=domain.com --title="First Attempt" --admin_user=adminpassword --admin_password=1234 --admin_email=a@4b.com

6) Test your wordpress instalation (login)

7) Create the .gitignore

8) Install composer

    {
        "repositories": [
            {
                "type": "composer",
                "url": "http://wpackagist.org"
            }
        ],
        "require": {
            "tareq1988/wp-eloquent": "dev-master",
            "wpackagist-theme/_tk": "*",
            "wpackagist-plugin/akismet": "3.1.1",
            "wpackagist-plugin/w3-total-cache": "*",
            "wpackagist-plugin/duplicator": "*",
            "wpackagist-plugin/wordpress-seo": "*"
        }
    }
    
## Installing composer with wordpress
https://developer.wordpress.org/cli/commands/

## More plugins
https://wpackagist.org/search
