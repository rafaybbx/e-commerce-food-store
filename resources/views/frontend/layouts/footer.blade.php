<!-- footer -->
<div class="footer-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="footer-box about-widget">
                    <h2 class="widget-title">About us</h2>
                    <p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium
                        doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box get-in-touch">
                    <h2 class="widget-title">Get in Touch</h2>
                    <ul>
                        <li>34/8, East Hukupara, Gifirtok, Sadan.</li>
                        <li>support@fruitkha.com</li>
                        <li>+00 111 222 3333</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box pages">
                    <h2 class="widget-title">Pages</h2>
                    <ul>
                        <li><a href="{{ url('/') }}">Home</a></li>
                        <li><a href="{{ url('/about') }}">About</a></li>
                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                        <li><a href="{{ url('/news') }}">News</a></li>
                        <li><a href="{{ url('/contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="footer-box subscribe">
                    <h2 class="widget-title">Subscribe</h2>
                    <p>Subscribe to our mailing list to get the latest updates.</p>
                    <form action="index.html">
                        <input type="email" placeholder="Email">
                        <button type="submit"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end footer -->

<!-- copyright -->
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <p>Copyrights &copy; 2019 - <a href="https://imransdesign.com/">Imran Hossain</a>, All Rights
                    Reserved.<br>
                    Distributed By - <a href="https://themewagon.com/">Themewagon</a>
                </p>
            </div>
            <div class="col-lg-6 text-right col-md-12">
                <div class="social-icons">
                    <ul>
                        <li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                        <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end copyright -->

<!-- jquery -->
<script src="assets/js/jquery-1.11.3.min.js"></script>
<!-- bootstrap -->
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<!-- count down -->
<script src="assets/js/jquery.countdown.js"></script>
<!-- isotope -->
<script src="assets/js/jquery.isotope-3.0.6.min.js"></script>
<!-- waypoints -->
<script src="assets/js/waypoints.js"></script>
<!-- owl carousel -->
<script src="assets/js/owl.carousel.min.js"></script>
<!-- magnific popup -->
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<!-- mean menu -->
<script src="assets/js/jquery.meanmenu.min.js"></script>
<!-- sticker js -->
<script src="assets/js/sticker.js"></script>
<!-- main js -->
<script src="assets/js/main.js"></script>

<script src={{ asset('https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js') }}></script>
<script src="{{ asset('dada.js') }}"></script>


<script>
    function updateCart() {
        // Your custom JavaScript code goes here
        alert('Your Order has been placed successfully');
        // You can perform additional actions or call other functions as needed


        $(document).ready(function() {
            // Handle click event on the "Place Order" button
            $("#placeOrderBtn").click(function() {
                // Gather form data
                var formData = $("#myForm").serialize();

                // Update the route link with the form data
                var routeLink = "{{ url('/updatecart') }}?" + formData;

                // Redirect to the new route
                window.location.href = routeLink;
            });
        });

    }



    // function searchProducts(){

    //   let searchValue = document.getElementById("searchbar").value;
    //   const route = '/search/'+searchValue;
    //   searchList = document.getElementById('searchlist');
    //   searchList.innerHTML = "";

    //   console.log(route);
    //   fetch(route)
    //   .then(response => {
    //     if (!response.ok) {
    //       throw new Error (Http error! Status : ${response.status});
    //     }
    //     return response.json();
    //   })
    //   .then(data => {
    //     data.forEach(product => {
    //       const listItem = document.createElement('li');
    //       listItem.textContent = product.name;
    //       searchList.appendChild(listItem);
    //     });
    //   })
    //   .catch(error => {
    //     console.error('Error: ',error)
    // })}



    // document.addEventListener("DOMContentLoaded", () => {


    //     function searchProducts() {

    //         alert("Product");




    //         let searchValue = document.getElementById("searchbar").value;
    //         const route = '/search/' + searchValue;
    //         searchList = document.getElementById('searchlist');
    //         searchList.innerHTML = "";

    //         console.log(route);
    //         fetch(route)
    //             .then(response => {
    //                 if (!response.ok) {
    //                     throw new Error(Http error!Status: $ {
    //                         response.status
    //                     });
    //                 }
    //                 return response.json();
    //             })
    //             .then(data => {
    //                 data.forEach(product => {
    //                     const listItem = document.createElement('li');
    //                     listItem.textContent = product.name;
    //                     searchList.appendChild(listItem);
    //                 });
    //             })
    //             .catch(error => {
    //                 console.error('Error: ', error)
    //             })
    //     }
    // });
</script>


</body>

</html>
