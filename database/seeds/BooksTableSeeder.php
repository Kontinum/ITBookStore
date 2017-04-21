<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $book = new \App\Book([
            'isbn' => '978-0987153029',
            'name' => 'The CSS3 Anthology, 4th Edition',
            'year' => 2012,
            'description' => 'The CSS Anthology: 101 Essential Tips, Tricks & Hacks is a compilation of best-practice solutions to the most challenging CSS problems. The fourth edition of this best-selling book has been completely revised and updated to cover newer techniques enabled by CSS3 and HTML5, and more recent trends in web design, such as responsive design.

It is the most complete question-and-answer book on CSS available, with over 100 tutorials that show readers how to gain more control over the appearance of their web pages, create sophisticated web page navigation controls, and design for alternative browsing devices, including phones and screen readers.

The CSS code used to create each of the components is available for download and guaranteed to be simple, efficient and cross-browser compatible.',
            'price' => 20,
            'picture' => 'https://images-na.ssl-images-amazon.com/images/I/51YGiJPapyL._SX387_BO1,204,203,200_.jpg',
            'pages' => '450'
        ]);
        $book->save();

        $book = new \App\Book([
            'isbn' => '978-0987153029',
            'name' => 'PHP and MySQL Web Development, 4th Edition',
            'year' => 2008,
            'description' => 'PHP and MySQL are popular open-source technologies that are ideal for quickly developing database-driven Web applications. PHP is a powerful scripting language designed to enable developers to create highly featured Web applications quickly, and MySQL is a fast, reliable database that integrates well with PHP and is suited for dynamic Internet-based applications.

This practical, hands-on book includes numerous examples that demonstrate common tasks such as authenticating users, constructing a shopping cart, generating PDF documents and images dynamically, sending and managing email, facilitating user discussions, connecting to Web services using XML, and developing Web 2.0 applications with Ajax-based interactivity.',
            'price' => 30,
            'picture' => 'https://images-na.ssl-images-amazon.com/images/I/51AigeIv7OL._SX387_BO1,204,203,200_.jpg',
            'pages' => '1008'
        ]);
        $book->save();

        $book = new \App\Book([
            'isbn' => '978-0987153029',
            'name' => 'Java The Complete Reference, 8th Edition',
            'year' => 2011,
            'description' => 'In Java: The Complete Reference, Eighth Edition, bestselling programming author Herb Schildt shows you everything you need to develop, compile, debug, and run Java programs. Updated for Java Platform, Standard Edition 7 (Java SE 7), this comprehensive volume covers the entire Java language, including its syntax, keywords, and fundamental programming principles. You’ll also find information on key elements of the Java API library. JavaBeans, servlets, applets, and Swing are examined and real-world examples demonstrate Java in action. In addition, new Java SE 7 features such as try-with-resources, strings in switch, type inference with the diamond operator, NIO.2, and the Fork/Join Framework are discussed in detail.',
            'price' => 35,
            'picture' => 'http://www.allitebooks.com/wp-content/uploads/1474/3857e09fcce8c02.jpg',
            'pages' => '1152'
        ]);
        $book->save();

        $book = new \App\Book([
            'isbn' => '978-0987153029',
            'name' => 'MySQL Cookbook, 3rd Edition',
            'year' => 2014,
            'description' => 'MySQL’s popularity has brought a flood of questions about how to solve specific problems, and that’s where this cookbook is essential. When you need quick solutions or techniques, this handy resource provides scores of short, focused pieces of code, hundreds of worked-out examples, and clear, concise explanations for programmers who don’t have the time (or expertise) to solve MySQL problems from scratch.

Ideal for beginners and professional database and web developers, this updated third edition covers powerful features in MySQL 5.6 (and some in 5.7). The book focuses on programming APIs in Python, PHP, Java, Perl, and Ruby.',
            'price' => 28,
            'picture' => 'http://www.allitebooks.com/wp-content/uploads/2015/04/MySQL-Cookbook-3rd-Edition.jpg',
            'pages' => '1100'
        ]);
        $book->save();
    }
}
