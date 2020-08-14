                                          
                                                                            PizzaShop
                                          
                                          
                                          This is e-commerce laravel application, Every visitor to the site can make an order.
                                          The application has a shopping cart whose data is stored in the session.
                                          Each pizza in the menu has an add to cart option and each user has that option.
                                          In the left corner of the header, each user has a link that leads him to see what 
                                          his cart currently looks like. Next to the link, write the number of pizzas in the cart,
                                          if any. If there are pizzas in the cart, the cart shows the same pizzas in the group, 
                                          shows the quantity of pizzas as well as the total price which is the sum of all pizza
                                          prices in the groups. sopping cart also shows the total price of the order in dollars and euros.
                                          Also, all prices are shown in dollars and euros. In a group of pizzas the user has an option 
                                          "ReduceByOne" which throws one pizza out of the group. if he removes the last pizza from the group,
                                          the group  is no longer displayed in the cart.  cart has a button checkout  that takes user to the 
                                          form. When he submit that form,he send request to Stripe API(https://stripe.com/en-gb-us) to
                                         processing order with payment. If the request is successful, we store the order in the database
                                          otherwise we print the error. The user returns to the main page with a message about a successful purchase. 
                                          Each logged in user has an option in the header center "user profile"  to see all their orders.
                                          The application remembers the orders of users who ordered before they created the profile, by the field in database 
                                          "contact_details" , which is unique for all people. And if these users make an order after the they create profile,
                                          they will also see their old orders.
                                          
                                          
                                          
                                                                                   Technologies: Laravel  5.6.40
                                                                                     I used repository patern.
                                          
                                           
                                           
                                         
                                           
                                          
