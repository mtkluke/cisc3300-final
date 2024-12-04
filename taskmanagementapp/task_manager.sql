CREATE DATABASE task_manager;

USE task_manager;

CREATE TABLE tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    deadline DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO tasks (title, description, deadline)
VALUES
    ('Do Laundry', 'I wore pajamas to class yesterday, plz fix', '2024-12-10'),
    ('Call Mom', 'Hi Mom', '2024-12-05'),
    ('Buy groceries', 'Purchase eight potatoes, a 1/4 lb of cream cheese, and a cucumber. ', '2024-12-04'),
    ('Submit Webpages Final Project', 'Finish that weird task manager website thing', '2024-12-03'),
    ('Doctor appointment', 'Get that weird toenail thing checked out.', '2024-12-08');