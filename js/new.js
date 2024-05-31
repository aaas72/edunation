const addSecLabel = document.querySelector('.add-sec');
const delSecLabel = document.querySelector('.del-sec');
const upSecLabel = document.querySelector('.up-sec');


const listAdd = document.querySelector('.list-add');
const listDel = document.querySelector('.list-del');
const listUp = document.querySelector('.list-up');

const showLesson = document.querySelector('.box-lesson');
const lessonList = document.querySelector('.box-details');

const addShowPanelEvent = document.querySelector('.add-event-p');
const addShowPanelArticle = document.querySelector('.add-article-p');
const addShowPanelCoures = document.querySelector('.add-coures-p');
const addShowPanelUser = document.querySelector('.add-user-p');

const delShowPanelEvent = document.querySelector('.del-event-p');
const delShowPanelArticle = document.querySelector('.del-article-p');
const delShowPanelCoures = document.querySelector('.del-coures-p');
const delShowPanelUser = document.querySelector('.del-user-p');

const upShowPanelEvent = document.querySelector('.up-event-p');
const upShowPanelArticle = document.querySelector('.up-article-p');
const upShowPanelCoures = document.querySelector('.up-coures-p');
const upShowPanelUser = document.querySelector('.up-user-p');

const eventPanel = document.querySelector('.events');
const articlePanel = document.querySelector('.articles');
const couresPanel = document.querySelector('.coures');
const userPanel = document.querySelector('.user');


const delArticlePanel = document.querySelector('.del-article-main');
const delEventPanel = document.querySelector('.del-event-main');
const delCuoresPanel = document.querySelector('.del-coures-main');
const delUserPanel = document.querySelector('.del-user-main');

const upArticlePanel = document.querySelector('.up-article-main');
const upEventPanel = document.querySelector('.up-event-main');
const upCoursePanel = document.querySelector('.up-course-main');
const upUserePanel = document.querySelector('.up-user-main');




let currentPanel = null; // تتبع اللوحة الحالية

addSecLabel.addEventListener('click', function () {
    toggleElementDisplay(listAdd);
});
delSecLabel.addEventListener('click', function () {
    toggleElementDisplay(listDel);
});
upSecLabel.addEventListener('click', function () {
    toggleElementDisplay(listUp);
})


addShowPanelEvent.addEventListener('click', function () {
    toggleElementDisplay(eventPanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = eventPanel; // تحديث اللوحة الحالية
});

addShowPanelArticle.addEventListener('click', function () {
    toggleElementDisplay(articlePanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = articlePanel; // تحديث اللوحة الحالية
});
addShowPanelCoures.addEventListener('click', function () {
    toggleElementDisplay(couresPanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = couresPanel; // تحديث اللوحة الحالية
});
addShowPanelUser.addEventListener('click', function () {
    toggleElementDisplay(userPanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = userPanel; // تحديث اللوحة الحالية
});


delShowPanelArticle.addEventListener('click', function () {
    toggleElementDisplay(delArticlePanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = delArticlePanel; // تحديث اللوحة الحالية
});
delShowPanelEvent.addEventListener('click', function () {
    toggleElementDisplay(delEventPanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = delEventPanel; // تحديث اللوحة الحالية
});
delShowPanelCoures.addEventListener('click', function () {
    toggleElementDisplay(delCuoresPanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = delCuoresPanel; // تحديث اللوحة الحالية
});
delShowPanelUser.addEventListener('click', function () {
    toggleElementDisplay(delUserPanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = delUserPanel; // تحديث اللوحة الحالية
});


upShowPanelArticle.addEventListener('click', function () {
    toggleElementDisplay(upArticlePanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = upArticlePanel; // تحديث اللوحة الحالية
});
upShowPanelEvent.addEventListener('click', function () {
    toggleElementDisplay(upEventPanel);
    closeCurrentPanel(); // إغلاق اللوحة الحالية
    currentPanel = upEventPanel; // تحديث اللوحة الحالية
});

upShowPanelCoures.addEventListener('click', function () {
    toggleElementDisplay(upCoursePanel);
    closeCurrentPanel();
    currentPanel = upCoursePanel;
});

upShowPanelUser.addEventListener('click', function () {
    toggleElementDisplay(upUserePanel);
    closeCurrentPanel();
    currentPanel = upUserePanel;
});

// وظيفة لإغلاق اللوحة الحالية إذا كانت مفتوحة
// وظيفة لإغلاق اللوحة الحالية إذا كانت مفتوحة
function closeCurrentPanel() {
    if (currentPanel && currentPanel.style.display === 'block') {
        currentPanel.style.display = 'none';
    }
}


function deleteArticle(articleId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "../php/silme_işlemi.php?id=" + articleId, true);
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

function deleteEvent(eventId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                // يمكنك إضافة المزيد من العمليات هنا بعد حذف المقالة بنجاح
                location.reload(); // إعادة تحميل الصفحة بعد الحذف
            }
        };
        xhttp.open("GET", "../php/silme_işlemi.php?id=" + eventId, true);
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

function deleteCoures(couresId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                location.reload();
            }
        };
        xhttp.open("GET", "../php/silme_işlemi.php?id=" + couresId, true);
        xhttp.send();
    }
}


var deleteButtonsCoures = document.querySelectorAll("#delete-but-coures");
deleteButtonsCoures.forEach(function (button) {
    button.addEventListener("click", function () {
        var coures_Id = this.getAttribute("data-coures-id");
        deleteCoures(coures_Id);
    });
});


function deleteUser(userId) {
    if (confirm('هل أنت متأكد أنك تريد حذف هذا المقال؟')) {
        fetch("../php/silme_işlemi.php?id=" + userId, {
            method: 'GET',
        })
            .then(response => {
                // يمكنك إجراء إجراءات بعد الحذف هنا
            })
            .catch(error => console.error('حدث خطأ أثناء طلب الحذف:', error));
    }
}




var deleteButtonsCoures = document.querySelectorAll("#delete-but-user");
deleteButtonsCoures.forEach(function (button) {
    button.addEventListener("click", function () {
        var userId = this.getAttribute("data-user-id");
        deleteUser(userId);
    });
});


const box = document.querySelector(".box");
const shows = document.querySelector(".lessonList");
box.addEventListener('click', function () {
    toggleElementDisplay(shows);
})

function toggleElementDisplay(element) {
    element.style.display = (element.style.display === 'block') ? 'none' : 'block';
}

