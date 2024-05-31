/*----------------------------------------------------------------------------------------------*/
/******************************** MAKALELER SİLME İŞLEM *****************************************/
function deleteArticle(articleId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "../../php/delete_process.php?article_id=" + articleId, true);
        xhttp.send();
    }
}

var deleteButtonsArticle = document.querySelectorAll("#delete-but-article");
deleteButtonsArticle.forEach(function (button) {
    button.addEventListener("click", function () {
        var articleId = this.getAttribute("data-article-id");
        deleteArticle(articleId);
    });
});
/************************************************************************************************/
/******************************** OLAYLAR SİLME İŞLEM *****************************************/
function deleteEvent(eventId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // يمكنك إضافة المزيد من العمليات هنا بعد حذف المقالة بنجاح
                location.reload(); // إعادة تحميل الصفحة بعد الحذف
            }
        };
        xhttp.open("GET", "../../php/delete_process.php?event_id=" + eventId, true);
        xhttp.send();
    }
}

var deleteButtonsEvent = document.querySelectorAll("#delete-but-event");
deleteButtonsEvent.forEach(function (button) {
    button.addEventListener("click", function () {
        var eventId = this.getAttribute("data-event-id"); // تغيير الى "data-event-id"
        deleteEvent(eventId);
    });
});

/************************************************************************************************/
/******************************** KURSLAR SİLME İŞLEM *****************************************/

function deleteCoures(couresId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "../../php/delete_process.php?course_id=" + couresId, true);
        xhttp.send();
    }
}
var deleteButtonsCoures = document.querySelectorAll("#delete-but-course");
deleteButtonsCoures.forEach(function (button) {
    button.addEventListener("click", function () {
        var coures_Id = this.getAttribute("data-course-id");
        deleteCoures(coures_Id);
    });
});
/************************************************************************************************/
/******************************** ÜNİTE SİLME İŞLEM *****************************************/
function deleteUnit(unitId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "../../php/delete_process.php?unit_id=" + unitId, true);
        xhttp.send();
    }
}
var deleteButtonsCoures = document.querySelectorAll("#delete-but-unit");
deleteButtonsCoures.forEach(function (button) {
    button.addEventListener("click", function () {
        var unitId = this.getAttribute("data-unit-id");
        deleteUnit(unitId);
    });
});
/************************************************************************************************/
/******************************** DERS SİLME İŞLEM *****************************************/
function deleteLesson(lessonId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "../../php/delete_process.php?lesson_id=" + lessonId, true);
        xhttp.send();
    }
}
var deleteButtonsCoures = document.querySelectorAll("#delete-but-lesson");
deleteButtonsCoures.forEach(function (button) {
    button.addEventListener("click", function () {
        var coures_Id = this.getAttribute("data-lesson-id");
        deleteLesson(coures_Id);
    });
});
/************************************************************************************************/
/******************************** KULLANICI SİLME İŞLEM *****************************************/
function deleteUser(userId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        fetch("../../php/delete_process.php?user_id=" + userId, {
            method: 'GET',
        })
            .then(response => {
                location.reload();
            })
            .catch(error => console.error('حدث خطأ أثناء طلب الحذف:', error));
    }
}
var deleteButtonUsers = document.querySelectorAll("#delete-but-user");
deleteButtonUsers.forEach(function (button) {
    button.addEventListener("click", function () {
        var userId = this.getAttribute("data-user-id");
        deleteUser(userId);
    });
});
/************************************************************************************************/
