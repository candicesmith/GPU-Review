@extends('layouts.master')

@section('title')
  Documentation
@endsection

@section('content')
    <div class="mx-4 px-4 mt-4 mb-4">
        <div class="mr-0 ml-4 product-title">
            2703ICT Web Application Development - Assignment 2
        </div>
        <div class="ml-4 pr-4 pt-4 pb-4">
            <div class="product-title-small">Entity Relationship Diagram</div>
            <div class="mt-4 ml-4">
                <img src="{{ url('/products_images/ERD.PNG') }}">
            </div>   
            <div class="product-title-small mb-3 mt-4">Completed Requirements</div>
            <div class="product-desciption ml-4">
                <ul>    
                    <li class="mt-1">1. Users can register with this website as either a Member or Moderator</li>
                    <li class="mt-1">2. Registered users can login. Login can be done from any page. The username and the user type are displayed at the top of every page. A logged in user can log out.</li>
                    <li class="mt-1">3. Users that have not logged in (guests) can see products and reviews, but cannot perform and credit, update, or delete.</li>
                    <li class="mt-1">4. Members can retrieve products and reviews, as well as post products and review. Member can also update and delete their own reviews.</li>
                    <li class="mt-1">5. Moderators can perform CRUD on all products and reviews.</li>
                    <li class="mt-1">6. A product contains the product name, manufacture, description, a price, and an URL to that product. All fields except URL must not be empty. 
                        <div class="ml-3">Price must be greater than 0. The product name must be unique. An URL, if supplied, must be a valid URL.</div></li>
                    <li class="mt-1">7. A review contains a creation date, a rating, and the review. A rating must be a number between 1 to 5, and review must have more than 5 characters. 
                        <div class="ml-3">A member/moderator can only post at most one review per product. After a new review is posted, the user is redirected to the page containing the newly posted review.</div></li>
                    <li class="mt-1">8. There is a page that lists all products, and allows the user to click on a product to show the details page for that product.</li>
                    <li class="mt-1">9. The details page shows all the information for that product, in addition it also displays all reviews for that product. When displaying review, 
                        <div class="ml-3">all information for that review is displayed including the user who posted that review.</div></li>
                    <li class="mt-1">10. The update form for product and review should contain the old value.</li>
                    <li class="mt-1">11. When a product is deleted, all reviews for that product should also be deleted.</li>
                    <li class="mt-1">12. If invalid input is detected, the appropriate error message is displayed, along with the previous entered value.</li>
                    <li class="mt-1">13. Access control: actions that cannot be performed by user are not displayed. </li>
                    <li class="mt-1">14. When there are more than 5 reviews for a product, pagination is used.</li>
                    <li class="mt-1">15. Users can upload an image of a product when creating the product.</li>
                    <li class="mt-1">16. Users can vote to like or dislike reviews. Reviews that have more dislikes than likes are outlined in red and reviews with more likes than dislikes are outlined in green. 
                        <div class="ml-3">A user can only vote for a review once.</div></li>
                    <li class="mt-1">17. A user can “follow” and “unfollow” reviewers. The user can see a list of people they have followed, and a list of reviews posted by the reviewer they have followed.</li>
                    <li class="mt-1">18. A recommendation feature which recommends reviewers the current logged in user may want to follow.</li>
                </ul>
            </div>
            <div class="product-title-small mb-3 mt-4">Incomplete Requirements</div>
            <div class="product-desciption ml-4">
                <ul>    
                    <li class="mt-1">15. A product cannot have many images uploaded by different users. Image upload is only available when creating a product.</li>
                    <li class="mt-1">18. The recommendation feature is not personalised. It is the same for every person. It may also recommend the user to follow users that they have already followed.</li>
                </ul>
            </div>
            <div class="product-title-small mb-3 mt-4">Reflection</div>
            <div class="product-desciption">
                To start this assignment, I created an entity relationship diagram for the initial design. I created the database schema by creating tables using PHP Artisan make model. 
                I then designed all the routing to each page and set up the forms and post requests. From there it was an iterative process of slowly implementing all the features and requirements. 
                I tested my code regularly by using dd() in the controllers and views. Much like assignment 1, I did not have enough time to spend on this assignment to perfect it. 
                I had a lot of trouble understanding how to use Eloquent to query the database. I used Google to research any issues I came across and most of the time it was successfully resolved. 
                It is not to the standard I would have hoped for but overall I'm happy with what I have created.
            </div>
            <div class="product-title-small mb-3 mt-4">Recommendation Feature</div>
            <div class="product-desciption">
                The recommendation feature is very basic. It recommends users to follow based on the like-to-dislike ratio of their reviews. If a user has more likes than dislikes on any of their reviews, they will be recommended to all logged in users.
            </div>
        </div>
    </div>
@endsection