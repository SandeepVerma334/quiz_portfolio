-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 01, 2025 at 01:39 PM
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
(57, 'What is the purpose of `useEffect` hook in React?', 'The `useEffect` hook is used to perform side effects such as fetching data or interacting with the DOM in functional components.');

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

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
