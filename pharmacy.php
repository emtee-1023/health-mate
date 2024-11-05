<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Mate - Pharmacy</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #eaf7ea;
            color: #333;
        }

        /* Header Section */
        header {
            background-color: #216731;
            ;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
        }

        .cart {
            cursor: pointer;
            position: relative;
            display: flex;
            align-items: center;
        }

        .cart img {
            width: 40px;
            filter: invert(1);
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -10px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 4px 8px;
            font-size: 14px;
        }

        /* Main Content Section */
        main {
            padding: 20px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .search-bar {
            margin-bottom: 20px;
            display: flex;
            justify-content: center;
        }

        .search-bar input {
            padding: 10px;
            width: 70%;
            border: 2px solid #216731;
            ;
            border-radius: 4px;
            outline: none;
            font-size: 16px;
        }

        .pharmacy-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 20px;
        }

        .card {
            background-color: yellow;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            transition: filter 0.3s ease, opacity 0.3s ease;
            opacity: 0.8;
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .card:hover img {
            opacity: 1;
            filter: grayscale(0);
        }

        .card h3 {
            margin: 15px 0;
            color: #216731;
            ;
        }

        .card p {
            margin: 10px 0;
            font-size: 14px;
            color: #666;
        }

        .card button {
            padding: 12px 18px;
            background-color: #216731;
            ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .card button:hover {
            background-color: #216731;
            ;
        }

        /* Cart Modal */
        .cart-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            z-index: 1000;
        }

        .cart-modal h2 {
            margin-top: 0;
            color: #216731;
            ;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .cart-item button {
            background-color: red;
            padding: 5px 8px;
            border: none;
            border-radius: 3px;
            color: white;
            cursor: pointer;
        }

        .cart-item button:hover {
            background-color: darkred;
        }

        /* Overlay */
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        /* Buy Section */
        .buy-section {
            margin-top: 20px;
            text-align: center;
        }

        .buy-section button {
            padding: 15px 30px;
            background-color: #216731;
            ;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        .buy-section button:hover {
            background-color: #216731;
            ;
        }

        /* Delivery Modal */
        .delivery-modal {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            width: 350px;
            z-index: 1000;
        }

        .delivery-modal h2 {
            margin-top: 0;
            color: #216731;
            ;
        }

        .delivery-modal label {
            display: block;
            margin: 10px 0 5px;
        }

        .delivery-modal input {
            width: 100%;
            padding: 10px;
            border: 2px solid #216731;
            ;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .delivery-modal button {
            padding: 10px 20px;
            background-color: #216731;
            ;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-top: 10px;
        }

        .delivery-modal button:hover {
            background-color: #216731;
            ;
        }

        /* Map Section */
        #map {
            height: 300px;
            width: 100%;
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <!-- Header Section -->
    <header>
        <div class="logo">Health Mate Pharmacy</div>
        <nav>
            <a href="home.php">Home</a>
            <a href="dashp.php">Dashboard</a>
            <a href="departments.php">Departments</a>
        </nav>
        <div class="cart" onclick="toggleCartModal()">
            <img src="https://cdn-icons-png.flaticon.com/512/2331/2331970.png" alt="Cart">
            <div class="cart-count" id="cart-count">0</div>
        </div>
    </header>

    <!-- Main Content Section -->
    <main>
        <!-- Search Bar -->
        <div class="search-bar">
            <input type="text" placeholder="Search for medicines..." id="searchInput">
        </div>

        <div class="pharmacy-grid">
            <!-- Card 1 -->
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/3448/3448710.png" alt="Medicine 1">
                <h3>Paracetamol</h3>
                <p>Common pain reliever & fever reducer.</p>
                <p>Ksh 200.00</p>
                <button onclick="addToCart('Paracetamol', 200)">Add to Cart</button>
            </div>
            <!-- Card 2 -->
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/3448/3448710.png" alt="Medicine 2">
                <h3>Amoxicillin</h3>
                <p>Used to treat various bacterial infections.</p>
                <p>Ksh 500.00</p>
                <button onclick="addToCart('Amoxicillin', 500)">Add to Cart</button>
            </div>
            <!-- Card 3 -->
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/3448/3448710.png" alt="Medicine 3">
                <h3>Aspirin</h3>
                <p>Reduces pain, fever, or inflammation.</p>
                <p>Ksh 150.00</p>
                <button onclick="addToCart('Aspirin', 150)">Add to Cart</button>
            </div>
            <!-- Card 4 -->
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/3448/3448710.png" alt="Medicine 4">
                <h3>Cough Syrup</h3>
                <p>Relieves cough and throat irritation.</p>
                <p>Ksh 300.00</p>
                <button onclick="addToCart('Cough Syrup', 300)">Add to Cart</button>
            </div>
            <!-- Card 5 -->
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/3448/3448710.png" alt="Medicine 5">
                <h3>Vitamin C</h3>
                <p>Boosts immune system and skin health.</p>
                <p>Ksh 180.00</p>
                <button onclick="addToCart('Vitamin C', 180)">Add to Cart</button>
            </div>
            <!-- Card 6 -->
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/3448/3448710.png" alt="Medicine 6">
                <h3>Antibiotic Ointment</h3>
                <p>Used for treating minor cuts and burns.</p>
                <p>Ksh 250.00</p>
                <button onclick="addToCart('Antibiotic Ointment', 250)">Add to Cart</button>
            </div>
            <!-- Card 7 -->
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/3448/3448710.png" alt="Medicine 7">
                <h3>Antihistamine</h3>
                <p>Relieves allergy symptoms.</p>
                <p>Ksh 220.00</p>
                <button onclick="addToCart('Antihistamine', 220)">Add to Cart</button>
            </div>
            <!-- Card 8 -->
            <div class="card">
                <img src="https://cdn-icons-png.flaticon.com/512/3448/3448710.png" alt="Medicine 8">
                <h3>Antacids</h3>
                <p>Relieves heartburn and indigestion.</p>
                <p>Ksh 270.00</p>
                <button onclick="addToCart('Antacids', 270)">Add to Cart</button>
            </div>
        </div>

        <!-- Cart Modal -->
        <div class="cart-modal" id="cart-modal">
            <h2>Your Cart</h2>
            <div id="cart-items"></div>
            <div class="buy-section">
                <button onclick="processPurchase()">Buy Now</button>
            </div>
        </div>

        <!-- Delivery Modal -->
        <div class="delivery-modal" id="delivery-modal">
            <h2>Delivery Information</h2>
            <label for="delivery-address">Delivery Address:</label>
            <input type="text" id="delivery-address" placeholder="Enter your delivery address">
            <label for="delivery-phone">Phone Number:</label>
            <input type="text" id="delivery-phone" placeholder="Enter your phone number">
            <button onclick="confirmDelivery()">Confirm Delivery</button>
        </div>

        <!-- Map Section -->
        <div id="map"></div>

        <!-- Overlay -->
        <div class="overlay" id="overlay" onclick="closeModals()"></div>
    </main>

    <script>
        let cart = [];
        let cartCount = 0;

        function addToCart(name, price) {
            cart.push({ name, price });
            cartCount++;
            document.getElementById('cart-count').textContent = cartCount;
            displayCartItems();
        }

        function displayCartItems() {
            const cartItems = document.getElementById('cart-items');
            cartItems.innerHTML = '';
            cart.forEach((item, index) => {
                cartItems.innerHTML += `
                    <div class="cart-item">
                        <span>${item.name} - Ksh ${item.price.toFixed(2)}</span>
                        <button onclick="removeFromCart(${index})">Remove</button>
                    </div>
                `;
            });
        }

        function removeFromCart(index) {
            cart.splice(index, 1);
            cartCount--;
            document.getElementById('cart-count').textContent = cartCount;
            displayCartItems();
        }

        function toggleCartModal() {
            const cartModal = document.getElementById('cart-modal');
            const overlay = document.getElementById('overlay');
            cartModal.style.display = cartModal.style.display === 'block' ? 'none' : 'block';
            overlay.style.display = overlay.style.display === 'block' ? 'none' : 'block';
        }

        function closeModals() {
            const cartModal = document.getElementById('cart-modal');
            const deliveryModal = document.getElementById('delivery-modal');
            const overlay = document.getElementById('overlay');
            cartModal.style.display = 'none';
            deliveryModal.style.display = 'none';
            overlay.style.display = 'none';
        }

        function processPurchase() {
            const totalAmount = cart.reduce((total, item) => total + item.price, 0);
            const phoneNumber = prompt('Enter your Safaricom phone number:');
            if (phoneNumber) {
                // Use Daraja API to process payment (replace this with actual API call)
                alert(`Processing payment of Ksh ${totalAmount.toFixed(2)} for ${phoneNumber}`);
                cart = [];
                cartCount = 0;
                document.getElementById('cart-count').textContent = cartCount;
                displayCartItems();
                toggleCartModal();
                document.getElementById('delivery-modal').style.display = 'block';
                document.getElementById('overlay').style.display = 'block';
            }
        }

        function confirmDelivery() {
            const address = document.getElementById('delivery-address').value;
            const phoneNumber = document.getElementById('delivery-phone').value;
            if (address && phoneNumber) {
                alert(`Delivery confirmed to ${address}. We will contact you at ${phoneNumber}.`);
                closeModals();
                // Initialize map (pseudo code, replace with actual map initialization)
                initializeMap();
            } else {
                alert('Please provide both delivery address and phone number.');
            }
        }

        function initializeMap() {
            // Initialize a simple map (using a placeholder, replace with actual map implementation)
            const map = document.getElementById('map');
            map.innerHTML = `<p>Map would be displayed here.</p>`;
            // Here you would use a map API to show the delivery location
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchValue = this.value.toLowerCase();
            document.querySelectorAll('.pharmacy-grid .card').forEach(card => {
                const text = card.textContent.toLowerCase();
                card.style.display = text.includes(searchValue) ? 'block' : 'none';
            });
        });
    </script>
</body>

</html>
