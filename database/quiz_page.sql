-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 02:04 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz_page`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `answer`) VALUES
(1, 'What is PHP?', 'PHP is a server-side scripting language used for web development.'),
(2, 'What are some features of PHP?', 'PHP supports dynamic typing, functions, and object-oriented programming.'),
(3, 'What is Node.js?', 'Node.js is a runtime environment for executing JavaScript code outside a web browser.'),
(4, 'What is Express.js in Node.js?', 'Express.js is a web application framework for Node.js that simplifies server-side development.'),
(5, 'What is React.js?', 'React.js is a JavaScript library for building user interfaces, especially single-page applications.'),
(6, 'What are React components?', 'React components are reusable UI elements that can be either class-based or functional.'),
(7, 'What is Next.js?', 'Next.js is a React-based framework that allows server-side rendering and static site generation.'),
(8, 'What is server-side rendering in Next.js?', 'Server-side rendering in Next.js allows content to be rendered on the server before being sent to the client.'),
(9, 'What is MongoDB?', 'MongoDB is a NoSQL, document-based database that stores data in JSON-like format.'),
(10, 'What are the advantages of MongoDB over SQL databases?', 'MongoDB allows for flexible schema design and scaling horizontally.'),
(11, 'What is JavaScript?', 'JavaScript is a programming language used for building interactive web applications.'),
(12, 'What are closures in JavaScript?', 'Closures are functions that retain access to variables from their containing scope, even after the outer function has returned.'),
(13, 'What is the difference between var, let, and const in JavaScript?', 'var is function-scoped, let and const are block-scoped, with const being immutable.'),
(14, 'What is HTML?', 'HTML stands for HyperText Markup Language, used for structuring content on the web.'),
(15, 'What is the purpose of the `<head>` tag in HTML?', 'The `<head>` tag contains metadata about the document, such as title, styles, and scripts.'),
(16, 'What are CSS selectors?', 'CSS selectors are patterns used to select elements in HTML to apply styles.'),
(17, 'What is the difference between class and id selectors in CSS?', 'A class can be used for multiple elements, whereas an id is unique to a single element.'),
(18, 'What is Bootstrap?', 'Bootstrap is a front-end framework that helps developers design responsive and mobile-first websites quickly.'),
(19, 'How does Bootstrap grid system work?', 'Bootstrap grid system divides the screen into 12 columns, which can be customized for responsive layouts.'),
(20, 'What is a REST API?', 'REST (Representational State Transfer) is an architectural style for building web services that use HTTP requests.'),
(21, 'What is CORS in Node.js?', 'CORS (Cross-Origin Resource Sharing) is a mechanism that allows a web page from one domain to access resources from another domain.'),
(22, 'What is JSX in React?', 'JSX is a syntax extension for JavaScript that allows HTML-like code to be written inside JavaScript.'),
(23, 'How does React handle events?', 'React uses synthetic events that wrap around browser’s native events to ensure consistency across browsers.'),
(24, 'What is Redux?', 'Redux is a state management library for JavaScript apps, often used with React to manage app state.'),
(25, 'What are props in React?', 'Props (short for properties) are inputs passed from a parent component to a child component in React.'),
(26, 'What is MongoDB aggregation?', 'Aggregation is a way to process data records and return computed results, similar to SQL GROUP BY.'),
(27, 'How do you create a MongoDB collection?', 'A MongoDB collection is created automatically when you insert a document into a non-existing collection.'),
(28, 'What is async/await in JavaScript?', 'Async/await is a syntax that allows handling asynchronous operations in a more readable and synchronous way.'),
(29, 'What is the difference between == and === in JavaScript?', '== compares values after type conversion, while === compares both value and type.'),
(30, 'What is the box model in CSS?', 'The CSS box model defines the rectangular boxes generated for elements, consisting of margin, border, padding, and content.'),
(31, 'What is the difference between inline and block elements in CSS?', 'Inline elements take up only as much width as necessary, while block elements take up the full width available.'),
(32, 'What is a WebSocket?', 'A WebSocket is a protocol for full-duplex communication channels over a single, long-lived TCP connection.'),
(33, 'What is MongoDB indexing?', 'Indexing in MongoDB is a technique for improving the speed of data retrieval operations.'),
(34, 'What is server-side rendering in React?', 'Server-side rendering in React refers to rendering React components on the server and sending the HTML to the browser.'),
(35, 'What is the purpose of the `useState` hook in React?', '`useState` is a React hook that allows you to add state to functional components.'),
(36, 'What is the Virtual DOM in React?', 'The Virtual DOM is an in-memory representation of the real DOM elements, allowing React to efficiently update the UI.'),
(37, 'What is the difference between flexbox and grid in CSS?', 'Flexbox is for one-dimensional layouts, while grid is for two-dimensional layouts with rows and columns.'),
(38, 'What is Node Package Manager (NPM)?', 'NPM is a package manager for JavaScript that is used to install, share, and manage dependencies for Node.js applications.'),
(39, 'What is the purpose of Webpack?', 'Webpack is a module bundler for JavaScript applications, which helps in optimizing the loading and performance of web apps.'),
(40, 'What is a promise in JavaScript?', 'A promise is an object that represents the eventual completion or failure of an asynchronous operation.'),
(41, 'What are the advantages of using Node.js?', 'Node.js is fast, scalable, and suitable for building real-time applications with non-blocking I/O.'),
(42, 'What is a component in React?', 'A React component is a self-contained unit that manages its own structure, logic, and presentation.'),
(43, 'What is a state in React?', 'State in React represents the dynamic data that determines how a component renders.'),
(44, 'What are some common Bootstrap components?', 'Common Bootstrap components include navigation bars, modals, carousels, and cards.'),
(45, 'What is AJAX?', 'AJAX (Asynchronous JavaScript and XML) is a technique for making asynchronous requests to the server without reloading the page.'),
(46, 'What is the `componentDidMount` lifecycle method in React?', 'The `componentDidMount` method is called after a component has been rendered and mounted to the DOM.'),
(47, 'What is MongoDB Compass?', 'MongoDB Compass is a graphical user interface for MongoDB, providing an easy way to visualize and interact with data.'),
(48, 'What is MongoDB Atlas?', 'MongoDB Atlas is a cloud database service for MongoDB that offers automatic scaling, backups, and other features.'),
(49, 'How do you create a form in HTML?', 'A form is created in HTML using the `<form>` tag, which can contain input fields, buttons, and other form elements.'),
(50, 'What are media queries in CSS?', 'Media queries are used to apply different styles based on the device characteristics, such as screen size or resolution.'),
(51, 'What is the use of the `flex` property in CSS?', 'The `flex` property defines how flex items grow or shrink in a flex container.'),
(52, 'What is the difference between a `div` and a `span` in HTML?', 'A `div` is a block-level element, while a `span` is an inline element.'),
(53, 'What are mixins in CSS?', 'Mixins are reusable sets of styles that can be included in other CSS rules or classes.'),
(54, 'What is an event loop in JavaScript?', 'The event loop is a mechanism that allows JavaScript to handle asynchronous operations like setTimeout and fetch.'),
(55, 'What is the difference between Node.js and traditional server-side languages?', 'Node.js is non-blocking and uses JavaScript, while traditional server-side languages like PHP are blocking and use their own syntax.'),
(56, 'What is MongoDB used for?', 'MongoDB is used for storing large volumes of data in JSON-like documents with flexible schema.'),
(57, 'What is the purpose of `useEffect` hook in React?', 'The `useEffect` hook is used to perform side effects such as fetching data or interacting with the DOM in functional components.'),
(58, 'What is the correct JavaScript syntax to change the content of the HTML element below?\n\n<p id=\"demo\">This is a demonstration.</p>', 'document.getElementById(\"demo\").innerHTML = \"Hello World!\";'),
(59, 'Choose the correct HTML element for the largest heading.', '<h1>'),
(60, 'How can you create a function in JavaScript?', 'function myFunction() { // code here }'),
(61, 'How do you call a function named \"myFunction\" in JavaScript?', 'myFunction();'),
(62, 'Which of the following is the correct way to write an if statement in JavaScript?', 'if (x > 5) { console.log(\"x is greater than 5\"); }'),
(63, 'What is the correct way to create a variable in JavaScript?', 'let x = 5;'),
(64, 'Which of the following will write \"Hello, World!\" in an alert box in JavaScript?', 'alert(\"Hello, World!\");'),
(65, 'What is the correct syntax to link an external JavaScript file?', '<script src=\"app.js\"></script>'),
(66, 'What is the correct HTML element for inserting a line break?', '<br>'),
(67, 'What is the correct HTML for adding a background color?', '<body style=\"background-color:yellow;\">'),
(68, 'Which HTML element is used to specify a footer for a document or section?', '<footer>'),
(69, 'Which HTML element is used to define important text?', '<strong>'),
(70, 'What is the correct HTML element to define emphasized text?', '<em>'),
(71, 'What is the correct way to write a JavaScript array?', 'let colors = [\"red\", \"green\", \"blue\"];'),
(72, 'How do you round the number 7.25 to the nearest integer in JavaScript?', 'Math.round(7.25);'),
(73, 'What is the correct way to add a comment in JavaScript?', '// This is a comment'),
(74, 'What is the correct HTML for creating a hyperlink?', '<a href=\"https://www.example.com\">Visit Example</a>'),
(75, 'What is the correct HTML element for playing video files?', '<video>'),
(76, 'What is the correct HTML element for playing audio files?', '<audio>'),
(77, 'How do you add a comment in HTML?', '<!-- This is a comment -->'),
(78, 'Which attribute is used to provide a tooltip for an HTML element?', 'title'),
(79, 'Which HTML attribute specifies an alternative text for an image, if the image cannot be displayed?', 'alt'),
(80, 'Which HTML tag is used to define an unordered list?', '<ul>'),
(81, 'Which HTML tag is used to define an ordered list?', '<ol>'),
(82, 'What is the correct JavaScript syntax for opening a new window called \"myWindow\"?', 'window.open(\"http://www.example.com\", \"myWindow\");'),
(83, 'What is the correct syntax to refer to an external CSS file?', '<link rel=\"stylesheet\" href=\"styles.css\">'),
(84, 'Which HTML attribute is used to specify the URL of an external stylesheet?', 'href'),
(85, 'What is the correct HTML for creating a checkbox?', '<input type=\"checkbox\">'),
(86, 'What is the correct HTML for creating a text input field?', '<input type=\"text\">'),
(87, 'How do you start writing a JavaScript script in an HTML document?', '<script>'),
(88, 'What is the correct way to write a JavaScript object?', 'let person = { firstName: \"John\", lastName: \"Doe\", age: 25 };'),
(89, 'What is the correct HTML element to specify a title for a document?', '<title>'),
(90, 'What is the correct HTML to display an image?', '<img src=\"image.jpg\" alt=\"Image description\">'),
(91, 'What is the correct JavaScript syntax to create an alert with the message \"Hello, World!\"?', 'alert(\"Hello, World!\");'),
(92, 'How do you check the length of an array in JavaScript?', 'array.length;'),
(93, 'What is the correct HTML element for inserting a table?', '<table>'),
(94, 'Which HTML element is used to group table rows?', '<tbody>'),
(95, 'How do you define a table header in HTML?', '<th>'),
(96, 'How do you create a button in HTML?', '<button>Click Me</button>'),
(97, 'What is the correct JavaScript method to add an element at the end of an array?', 'array.push(element);'),
(98, 'What is Python?', 'Python is a high-level, interpreted programming language known for its simplicity and readability.'),
(99, 'What are Python decorators?', 'Decorators are functions that modify the behavior of another function or method.'),
(100, 'What is the difference between Python lists and tuples?', 'Lists are mutable, while tuples are immutable.'),
(101, 'What is a lambda function in Python?', 'A lambda function is an anonymous function defined using the `lambda` keyword.'),
(102, 'What is Java?', 'Java is an object-oriented programming language designed to be platform-independent.'),
(103, 'What are Java Generics?', 'Generics enable types to be parameterized in classes, interfaces, and methods.'),
(104, 'What is the purpose of the `final` keyword in Java?', 'The `final` keyword is used to declare constants, prevent method overriding, or inheritance.'),
(105, 'What is the JVM?', 'The JVM (Java Virtual Machine) is an engine that executes Java bytecode on any platform.'),
(106, 'What is C++?', 'C++ is a high-performance, object-oriented programming language used for system and application development.'),
(107, 'What is the difference between a pointer and a reference in C++?', 'Pointers can be reassigned and are explicit, while references are immutable once assigned.'),
(108, 'What are constructors in C++?', 'Constructors are special functions in C++ used to initialize objects when they are created.'),
(109, 'What is C#?', 'C# is a modern, object-oriented programming language developed by Microsoft for building applications on the .NET platform.'),
(110, 'What is LINQ in C#?', 'LINQ (Language Integrated Query) is a feature in C# for querying data from various sources like collections, databases, and XML.'),
(111, 'What is a delegate in C#?', 'A delegate is a type-safe function pointer in C# used for callback methods.'),
(112, 'What is JavaScript?', 'JavaScript is a lightweight, interpreted programming language used to build interactive web applications.'),
(113, 'What is the difference between synchronous and asynchronous programming in JavaScript?', 'Synchronous programming executes tasks sequentially, while asynchronous programming allows tasks to run concurrently.'),
(114, 'What is TypeScript?', 'TypeScript is a superset of JavaScript that adds static typing and other features.'),
(115, 'What is Rust?', 'Rust is a systems programming language focused on safety, speed, and concurrency.'),
(116, 'What are ownership rules in Rust?', 'Rust’s ownership rules ensure memory safety by enforcing unique ownership and borrowing of data.'),
(117, 'What is Go (Golang)?', 'Go is an open-source programming language designed for simplicity, concurrency, and efficiency.'),
(118, 'What is the purpose of goroutines in Go?', 'Goroutines are lightweight threads managed by the Go runtime for concurrent programming.'),
(119, 'What is Kotlin?', 'Kotlin is a statically typed programming language interoperable with Java, primarily used for Android development.'),
(120, 'What are data classes in Kotlin?', 'Data classes in Kotlin are special classes used to hold data with features like `equals`, `hashCode`, and `toString`.'),
(121, 'What is Swift?', 'Swift is a powerful and intuitive programming language developed by Apple for building iOS and macOS applications.'),
(122, 'What is optional chaining in Swift?', 'Optional chaining allows accessing properties, methods, and subscripts of an optional that might be nil.'),
(123, 'What is Dart?', 'Dart is a client-optimized programming language used for building mobile and web applications, especially with Flutter.'),
(124, 'What is a Flutter widget?', 'A Flutter widget is an immutable description of part of the user interface.'),
(125, 'What is SQL?', 'SQL (Structured Query Language) is a language used to interact with relational databases.'),
(126, 'What are the differences between primary key and foreign key in SQL?', 'A primary key uniquely identifies a record, while a foreign key establishes a relationship between two tables.'),
(127, 'What is recursion in programming?', 'Recursion is a technique where a function calls itself to solve smaller instances of a problem.'),
(128, 'What is the difference between a stack and a queue?', 'A stack follows LIFO (Last In, First Out), while a queue follows FIFO (First In, First Out).'),
(129, 'What are hash tables?', 'Hash tables are data structures that map keys to values for fast lookup.'),
(130, 'What is Big O notation?', 'Big O notation describes the performance or complexity of an algorithm in terms of input size.'),
(131, 'What is dynamic programming?', 'Dynamic programming is a technique for solving problems by breaking them into overlapping subproblems.'),
(132, 'What is a binary tree?', 'A binary tree is a tree data structure where each node has at most two children.'),
(133, 'What is Git?', 'Git is a distributed version control system for tracking changes in source code.'),
(134, 'What is the purpose of a pull request in Git?', 'A pull request is used to propose changes to a repository and review them before merging.'),
(135, 'What is Docker?', 'Docker is a platform for building, shipping, and running applications in lightweight, isolated containers.'),
(136, 'What is Kubernetes?', 'Kubernetes is an open-source system for automating deployment, scaling, and management of containerized applications.'),
(137, 'What is an API?', 'An API (Application Programming Interface) allows communication between software applications.'),
(138, 'What is a GraphQL query?', 'A GraphQL query is a flexible way to fetch only the required data from an API.'),
(139, 'What is a WebSocket?', 'WebSocket is a protocol enabling two-way communication between a client and a server.'),
(140, 'What is TensorFlow?', 'TensorFlow is an open-source library for machine learning and artificial intelligence.'),
(141, 'What is a neural network?', 'A neural network is a machine learning model inspired by the human brain, used for recognizing patterns and making predictions.'),
(142, 'What is blockchain?', 'Blockchain is a decentralized ledger technology used for secure and transparent transactions.'),
(143, 'What is Solidity?', 'Solidity is a programming language for writing smart contracts on Ethereum and other blockchain platforms.'),
(144, 'PHP server scripts are surrounded by delimiters, which?', '<?php ... ?>'),
(145, 'How do you get information from a form that is submitted using the \"get\" method in PHP?', '$_GET[\"field_name\"];'),
(146, 'In PHP, you can use both single quotes ( \' \' ) and double quotes ( \" \" ) for strings: True or False?', 'True'),
(147, 'How do you include the contents of another PHP file?', 'include(\"file.php\"); or require(\"file.php\");'),
(148, 'What does the `isset()` function do in PHP?', 'Checks if a variable is set and is not NULL.'),
(149, 'What is the correct way to connect to a MySQL database in PHP?', 'mysqli_connect(\"hostname\", \"username\", \"password\", \"database\");'),
(150, 'What is Node.js?', 'Node.js is a runtime environment for running JavaScript on the server side.'),
(151, 'Which command is used to initialize a new Node.js project?', 'npm init'),
(152, 'What is the purpose of `package.json` in Node.js?', 'It holds metadata about the project and its dependencies.'),
(153, 'What is the Express.js framework used for in Node.js?', 'To build web applications and APIs.'),
(154, 'In React.js, what is the purpose of the `useState` hook?', 'To manage state in functional components.'),
(155, 'What is the difference between class components and functional components in React.js?', 'Class components use `class` syntax and have lifecycle methods, while functional components use functions and hooks.'),
(156, 'What is JSX in React.js?', 'JSX stands for JavaScript XML and allows mixing HTML with JavaScript.'),
(157, 'How do you apply CSS in React.js?', 'Using inline styles, CSS files, or styled-components.'),
(158, 'What is the difference between a div and a span in HTML?', '<div> is a block-level element, while <span> is an inline element.'),
(159, 'What is the purpose of the `alt` attribute in an HTML image tag?', 'To provide alternative text for an image if it cannot be displayed.'),
(160, 'What is a CSS pseudo-class?', 'A keyword added to selectors to specify the special state of the selected element (e.g., :hover).'),
(161, 'What is the difference between relative and absolute positioning in CSS?', 'Relative positioning is relative to itself, and absolute positioning is relative to the nearest positioned ancestor.'),
(162, 'What is the box model in CSS?', 'It describes the structure of an HTML element, including padding, border, and margin.'),
(163, 'What is Java?', 'Java is a high-level, class-based, object-oriented programming language.'),
(164, 'How do you declare a variable in Java?', 'Use the syntax: `type variableName = value;`.'),
(165, 'What is a constructor in Java?', 'A special method used to initialize objects.'),
(166, 'What is the purpose of the `public` access modifier in Java?', 'To make a class, method, or variable accessible from any other class.'),
(167, 'What is the difference between `==` and `.equals()` in Java?', '`==` compares references, while `.equals()` compares values.'),
(168, 'How do you add comments in Java?', '// for single-line comments and /* */ for multi-line comments.'),
(169, 'What is the purpose of `this` keyword in Java?', 'It refers to the current object of a class.'),
(170, 'What is the difference between GET and POST methods in HTTP?', 'GET is used to retrieve data, and POST is used to send data to the server.'),
(171, 'How do you center a block element in CSS?', 'Using margin: auto; and setting a specific width.'),
(172, 'What is the difference between `id` and `class` in HTML?', '`id` is unique and applies to one element, while `class` can be shared across multiple elements.'),
(173, 'How do you create a responsive design in CSS?', 'Using media queries and flexible layouts.'),
(174, 'What is an event loop in JavaScript?', 'It processes asynchronous callbacks and ensures non-blocking execution.'),
(175, 'What is the difference between synchronous and asynchronous programming?', 'Synchronous executes code sequentially, while asynchronous does not block the program while waiting for a task.'),
(176, 'What is a middleware in Express.js?', 'A function that has access to the request, response, and next middleware in the application lifecycle.'),
(177, 'What is the difference between PUT and PATCH methods in REST?', 'PUT updates the entire resource, while PATCH updates only specific fields.'),
(178, 'What is a promise in JavaScript?', 'An object representing the eventual completion or failure of an asynchronous operation.'),
(179, 'How do you handle errors in JavaScript promises?', 'Using .catch() or try-catch with async/await syntax.'),
(180, 'What is a JavaScript closure?', 'A function that retains access to its outer scope even after the outer function has executed.'),
(181, 'What is the difference between let, var, and const in JavaScript?', '`let` and `const` are block-scoped, while `var` is function-scoped.'),
(182, 'What is an API?', 'An Application Programming Interface enables communication between software applications.'),
(183, 'What is CORS?', 'Cross-Origin Resource Sharing is a mechanism to allow restricted resources on a web page to be requested from another domain.'),
(184, 'How do you start a server in Node.js?', 'Using the `http.createServer()` method or an Express app with `app.listen()`.'),
(185, 'What is the difference between React state and props?', 'State is managed within a component, while props are passed from parent to child components.'),
(186, 'What is a lifecycle method in React?', 'Methods that get invoked at different stages of a component’s lifecycle, like `componentDidMount` and `componentWillUnmount`.'),
(187, 'What is the purpose of React Router?', 'To handle routing and navigation in React applications.'),
(188, 'What is a database schema?', 'The structure that defines the organization of data in a database.'),
(189, 'What is the difference between SQL and NoSQL databases?', 'SQL uses structured schemas and tables, while NoSQL uses flexible, non-relational models.');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_answer`
--

CREATE TABLE `quiz_answer` (
  `id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `user_ans` varchar(255) NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `question` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(255) NOT NULL,
  `ques_id` int(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_ans` varchar(255) NOT NULL,
  `correct_ans` varchar(255) NOT NULL,
  `is_correct` tinyint(255) NOT NULL,
  `createdAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tags` text DEFAULT NULL,
  `role` enum('User','Admin') NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `description` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `email`, `tags`, `role`, `gender`, `description`, `password`, `created_at`, `file`) VALUES
(1, 'Nita', 'Sierra Love', 'Sherman', 'pexiq@mailinator.com', NULL, 'Admin', 'other', 'Qui non et soluta di', 'Pa$$w0rd!', '2025-01-01 09:18:37', 'rb_66113.png'),
(2, 'Miriam', 'Virginia Banks', 'Kim', 'vuqotiw@mailinator.com', 'User', '', 'male', 'Sed natus amet temp', 'Pa$$w0rd!', '2025-01-01 09:20:35', 'fc00.png'),
(5, 'Hilary', 'Scott Haynes', 'Macdonald', 'qusicok@mailinator.com', 'User', '', 'male', 'Nesciunt accusamus ', 'Pa$$w0rd!', '2025-01-01 09:23:20', 'coder.jpg'),
(6, 'Destiny', 'Gemma Pena', 'Melton', 'qidy@mailinator.com', 'User', '', 'male', 'Dicta fugiat aspern', 'Pa$$w0rd!', '2025-01-01 09:24:32', 'Firefly cute 10 year old anime girl with long straight black hair, reddish brown eyes and pale skin  (1).jpg'),
(8, 'Justine', 'Ursula Rocha', 'Price', 'syxogo@mailinator.com', '', 'Admin', 'other', 'Qui nesciunt ullam ', 'Pa$$w0rd!', '2025-01-01 09:26:58', 'Firefly cute 10 year old anime girl with long straight black hair, reddish brown eyes and pale skin  (2).jpg'),
(10, 'Amir', 'Robert Ball', 'Anderson', 'nevexyge@mailinator.com', '', 'Admin', 'male', 'Sed illum rerum quo', 'Pa$$w0rd!', '2025-01-01 09:29:29', 'fc00.png'),
(11, 'Carlos', 'Tatum Stephens', 'Chase', 'jojunimi@mailinator.com', '', 'Admin', 'male', 'Nisi qui consequat ', 'Pa$$w0rd!', '2025-01-01 09:30:06', 'WhatsApp Image 2024-10-29 at 9.13.22 PM (1).jpeg'),
(12, 'Dana', 'Amy Vargas', 'Fletcher', 'refyniru@mailinator.com', '', 'User', 'male', 'Deserunt pariatur T', 'Pa$$w0rd!', '2025-01-01 09:32:16', 'WhatsApp Image 2024-10-29 at 9.13.25 PM (1).jpeg'),
(14, 'sandeep', 'verma', 'ratiwal', 'sandeep@gmail.com', '', 'Admin', 'male', 'testing entry', 'test', '2025-01-01 09:42:19', 'pexels-grizzlybear-1237119.jpg'),
(15, 'Lysandra', 'Cherokee Finch', 'Todd', 'zihimyl@mailinator.com', '', 'User', 'female', 'Assumenda maxime hic', 'Pa$$w0rd!', '2025-01-01 09:45:37', 'pexels-pixabay-355853.jpg'),
(16, 'Hammett', 'Xander Mullen', 'Salinas', 'jiqo@mailinator.com', 'Ut voluptas voluptas,jsdhfkjsf', 'Admin', 'female', 'Et nulla quidem in i', 'Pa$$w0rd!', '2025-01-01 09:52:16', 'pexels-rpnickson-2885320.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_answer`
--
ALTER TABLE `quiz_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `quiz_answer`
--
ALTER TABLE `quiz_answer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
