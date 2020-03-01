-- Step 1: (5 points) Create and use a database called 'project01'
-- Ensure you check first if it already exists
-- CREATE YOUR DATABASE AND SET IT TO BE USED BELOW THIS LINE --
    CREATE DATABASE IF NOT EXISTS project01;
    use project01;

-- Step 2: (30 points) Create a table called 'supers' (3 points) with the following fields
-- Ensure you use logical data types
-- Ensure you use the NULL and NOT NULL logically
-- Ensure you check first if it already exists
--    id (must be the primary key and auto incrementing) (5 points)
--    first_name (2 points)
--    last_name (2 points)
--    date_of_birth (2 points)
--    alias (2 points)
--    active (2 points)
--    hero (2 points)
--    created_at (default is the current date and time) (4 points)
--    updated_at (default is the current date and time but when updated it should update the date and time) (6 points)

-- * HINT: Only 3 of the data types are strings...

-- CREATE YOUR TABLE BELOW THIS LINE --
    Create table if not exists supers(
        id int not null auto_increment.
        first_name varchar(85) not null,
        last_name varchar(85) not null,
        date_of_birth date not null,
        alias varchar(85) not null,
        active tinyint(1) not null, -- synonym for boolean, I prefer to see exactly whats happening
        hero tinyint(1) not null,
        created_at timestamp not null default current_timestamp,
        updated_at timestamp not null default current_timestamp on update current_timestamp,
        primary key (id)
    );

-- TOTAL POINTS POSSIBLE: 35