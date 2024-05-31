const pageLinks = {
    'home-page': '../Main_Pages/home.php',
    'coures-page': '../Main_Pages/courses.php',
    'articles-page': '../Main_Pages/articles.php',
    'events-page': '../Main_Pages/events.php',
    'contact-page': '../Main_Pages/contact.php',
    'profile': '../pages/profile.php',
    'my-course': '../Course_Pages/mycoureses.php',
    'log-out': '../../php/logout.php'
};
Object.entries(pageLinks).forEach(([linkId, linkUrl]) => {
    const link = document.getElementById(linkId);
    if (link) {
        link.addEventListener('click', function(event) {
            event.preventDefault();
            navigateToPage(linkUrl);
        });
    }
});


const downBoxes = [
    document.querySelector('.down-box1'),
    document.querySelector('.down-box2'),
    document.querySelector('.down-box3')
];

const accountIcon = document.getElementById('icon');
const accountMenu = document.querySelector('.account');
const closeButton = document.getElementById('x');

const addEventShow = document.getElementById('events-add');
const eventsAddPanel = document.getElementById('event');

function navigateToPage(pageUrl) {
    window.location.href = pageUrl;
}

accountIcon.addEventListener('click', function(event) {
    toggleElementDisplay(accountMenu);
});

closeButton.addEventListener('click', function(event) {
    hideElement(accountMenu);
});

addEventShow.addEventListener('click', function(event) {
    toggleElementDisplay(eventsAddPanel);
});




[...document.querySelectorAll('[id^="add-box"]')].forEach((button, index) => {
    button.addEventListener('click', function(event) {
        toggleElementDisplay(downBoxes[index]);
    });
});

function toggleElementDisplay(element) {
    element.style.display = (element.style.display === 'block') ? 'none' : 'block';
}

function hideElement(element) {
    element.style.display = 'none';
}






// اعترف عنصر حقل البريد الإلكتروني
var emailField = document.getElementById("email");
// اعترف برسالة الخطأ
var emailError = document.getElementById("emailError");

// أضف حدث "oninput" لحقل البريد الإلكتروني
emailField.oninput = function() {
    // قم بالتحقق من البريد الإلكتروني
    var isValid = validateEmail(emailField.value);
    // إذا كان البريد الإلكتروني غير صالح، عرض رسالة الخطأ
    if (!isValid) {
        emailError.style.display = "inline";
    } else {
        // إذا كان البريد الإلكتروني صالحًا، أخفي رسالة الخطأ
        emailError.style.display = "none";
    }
};

// وظيفة للتحقق من صحة البريد الإلكتروني باستخدام تعبير منتظم
function validateEmail(email) {
    var pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return pattern.test(email);
}


















// Get Slider Items | Array.form [ES6 Feature]
var sliderImages = Array.from(document.querySelectorAll('.slider-container img'));

// Get Number Of Slides
var slidesCount = sliderImages.length;

// Set Current Slide
var currentSlide = 1;

// Slide Number Element
var slideNumberElement = document.getElementById('slide-number');

// Previous and Next Buttons
var nextButton = document.getElementById('next');
var prevButton = document.getElementById('prev');

// Handle Click on Previous and Next Buttons
nextButton.onclick = nextSlide;
prevButton.onclick = prevSlide;

// Create The Main UL Element
var paginationElement = document.createElement('ul');

// Set ID On Created Ul Element
paginationElement.setAttribute('id', 'pagination-ul');

// Create List Items Based On Slides Count
for (var i = 1; i <= slidesCount; i++) {

    // Create The LI
    var paginationItem = document.createElement('li');

    // Set Custom Attribute
    paginationItem.setAttribute('data-index', i);

    // Set Item Content
    paginationItem.appendChild(document.createTextNode(i));

    // Append Items to The Main Ul List
    paginationElement.appendChild(paginationItem);

}

// Add The Created UL Element to The Page
document.getElementById('indicators').appendChild(paginationElement);

// Get The New Created UL
var paginationCreatedUl = document.getElementById('pagination-ul');

// Get Pagination Items | Array.form [ES6 Feature]
var paginationsBullets = Array.from(document.querySelectorAll('#pagination-ul li'));

// Loop Through All Bullets Items
for (var i = 0; i < paginationsBullets.length; i++) {

    paginationsBullets[i].onclick = function () {

        currentSlide = parseInt(this.getAttribute('data-index'));

        theChecker();

    }

}

// Trigger The Checker Function
theChecker();

// Next Slide Function
function nextSlide() {

    if (nextButton.classList.contains('disabled')) {

        // Do Nothing
        return false;

    } else {

        currentSlide++;

        theChecker();

    }

}

// Previous Slide Function
function prevSlide() {

    if (prevButton.classList.contains('disabled')) {

        // Do Nothing
        return false;

    } else {

        currentSlide--;

        theChecker();

    }

}

// Create The Checker Function
function theChecker() {

    // Set The Slide Number
    slideNumberElement.textContent = 'Slide #' + (currentSlide) + ' of ' + (slidesCount);

    // Remove All Active Classes
    removeAllActive();

    // Set Active Class On Current Slide
    sliderImages[currentSlide - 1].classList.add('active');

    // Set Active Class on Current Pagination Item
    paginationCreatedUl.children[currentSlide - 1].classList.add('active');

    // Check if Current Slide is The First
    if (currentSlide == 1) {

        // Add Disabled Class on Previous Button
        prevButton.classList.add('disabled');

    } else {

        // Remove Disabled Class From Previous Button
        prevButton.classList.remove('disabled');

    }

    // Check if Current Slide is The Last
    if (currentSlide == slidesCount) {

        // Add Disabled Class on Next Button
        nextButton.classList.add('disabled');

    } else {

        // Remove Disabled Class From Next Button
        nextButton.classList.remove('disabled');

    }

}

// Remove All Active Classes From Images and Pagination Bullets
function removeAllActive() {

    // Loop Through Images
    sliderImages.forEach(function (img) {

        img.classList.remove('active');

    });

    // Loop Through Pagination Bullets
    paginationsBullets.forEach(function (bullet) {

        bullet.classList.remove('active');

    });

}










