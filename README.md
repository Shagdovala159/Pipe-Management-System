
## Laravel version compatibility

| Laravel version 
| :-------------- |
| 10.x             |



## New Project Setup

-   Create blank new project in Gitlab.
-   Clone this project to the new project folder.

    ```bash
    $ git clone {this-repo-ur} {new-project-folder}
    ```

-   Go to the new project folder.

    ```bash
    $ cd {new-project-folder}
    ```

-   Change git origin remote url to the new project git.

    ```bash
    $ git remote set-url origin {new-project-repo.git}
    ```

-   Add repository URL to the git remote repository with a new name.
    ```bash
    $ git remote add {remote} {new-project-repo.git}
    ```
    This way, we can pull directly from project every time there is an update.
-   Push the update to the new project repository
    ```bash
    $ git push origin master
    ```

## Installation

-   Run composer install
    ```bash
    $ composer install
    ```
-   Copy the `.env.example` to `.env` file and update the file accordingly.
-   Generate key
    ```bash
    $ php artisan key:generate
    ```
-   Run the migration and superadmin creation process
    ```bash
    $ composer refresh-db
    ```

    new superadmin user is created with credentials:

    -   username: admin@admin.com
    -   password: password

-   Serve
    ```bash
    $ php artisan serve
    ```
-   Go to URL: http://localhost:8000/
