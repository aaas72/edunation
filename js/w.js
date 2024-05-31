// تأكد من أن العنصر موجود قبل محاولة الوصول إليه
const courses = document.querySelector('#courses');
if (courses) {
    courses.addEventListener('click', function () {
        window.location.href = '../pages/Admin_Pages/CoursesList.php';
    });
}

