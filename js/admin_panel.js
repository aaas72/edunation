// إغلاق القوائم المفتوحة عند النقر في أي مكان آخر على الصفحة
document.addEventListener('click', function(event) {
    if (!event.target.closest('.but-update') && !event.target.closest('.options')) {
        var openOptions = document.querySelectorAll('.options');
        openOptions.forEach(function(option) {
            option.style.display = 'none';
        });
    }
});

// Görüntüleme ve maskeleme işlevi
function toggleElementDisplay(element) {
    element.style.display = (element.style.display === 'block') ? 'none' : 'block';
}

// Kurs Güncelleme Panelini Taşımak İçin
const coursesList = document.querySelector('#courses');
coursesList.addEventListener('click', function () {
    window.location.href = '../Admin_Pages/CoursesList.php';
});

const articlesList = document.querySelector('#articles');
articlesList.addEventListener('click', function () {
    window.location.href = '../Admin_Pages/articlesList.php';
});
const eventsList = document.querySelector('#events');
eventsList.addEventListener('click', function () {
    window.location.href = '../Admin_Pages/EventsList.php';
});

const usersList = document.querySelector('#users');
usersList.addEventListener('click', function () {
    window.location.href = '../Admin_Pages/UserList.php';
});


// Makale Güncelleme Panelini Taşımak İçin
const upArticlePanel = document.querySelector('#up-article-panel');
upArticlePanel.addEventListener('click', function () {
    window.location.href = '../pages/updateArticlesList.php';
});

// Olay Güncelleme Panelini Taşımak İçin
const upEventPanel = document.querySelector('#up-event-panel');
upEventPanel.addEventListener('click', function () {
    window.location.href = '../pages/Admin_Pages/EventsList.php';
});

// Kullanıcı Güncelleme Panelini Taşımak İçin
const upUserPanel = document.querySelector('#up-user-panel');
upUserPanel.addEventListener('click', function () {
    window.location.href = '../pages/Admin_Pages/UserList.php';
});

// Kurs Silme Panelini Taşımak İçin
const delCoursePanel = document.querySelector('#del-course-panel');
delCoursePanel.addEventListener('click', function () {
    window.location.href = '../pages/deleteCouresPanal.php';
});

// Makale Silme Panelini Taşımak İçin
const delArticlePanel = document.querySelector('#del-article-panel');
delArticlePanel.addEventListener('click', function () {
    window.location.href = '../pages/deleteArticlePanal.php';
});

// Olay Silme Panelini Taşımak İçin
const delEventPanel = document.querySelector('#del-event-panel');
delEventPanel.addEventListener('click', function () {
    window.location.href = '../pages/deleteEventPanal.php';
});

// Kullanıcı Silme Panelini Taşımak İçin
const delUserPanel = document.querySelector('#del-user-panel');
delUserPanel.addEventListener('click', function () {
    window.location.href = '../pages/deleteUserPanal.php';
});

// قسم الأحداث
const sections = [
    {triggerId: '#add-but', listId: '#list-add'},
    {triggerId: '#update-but', listId: '#list-up'},
    {triggerId: '#delete-but', listId: '#list-del'},

    {triggerId: '#add-course-panel', url: '../pages/addCouresPanel.php'},
    {triggerId: '#add-article-panel', url: '../pages/addArticlePanel.php'},
    {triggerId: '#add-event-panel', url: '../pages/addEventPanel.php'},
    {triggerId: '#add-user-panel', url: '../pages/addUserPanel.php'}
];

sections.forEach(section => {
    const trigger = document.querySelector(section.triggerId);
    if (trigger) {
        trigger.addEventListener('click', function() {
            if (section.url) {
                window.location.href = section.url;
            } else {
                const list = document.querySelector(section.listId);
                toggleElementDisplay(list);
            }
        });
    }
});


function toggleLessons(unitId) {
    var lessonsList = document.getElementById('lessons-' + unitId);
    if (lessonsList.style.display === 'none') {
        lessonsList.style.display = 'block';
    } else {
        lessonsList.style.display = 'none';
    }
}



function toggleMenu(articleId) {
    var menu = document.getElementById('menu-' + articleId);
    if (menu.style.display === 'none' || menu.style.display === '') {
        menu.style.display = 'block';
    } else {
        menu.style.display = 'none';
    }
}

document.addEventListener('click', function(event) {
    var isClickInsideMenu = event.target.closest('.up-del');
    if (!isClickInsideMenu) {
        var menus = document.querySelectorAll('.list-unstyled');
        menus.forEach(function(menu) {
            menu.style.display = 'none';
        });
    }
});
