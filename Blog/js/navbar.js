(function () {
  "use strict";

  var siteMenuClone = function () {
    var jsCloneNavs = document.querySelectorAll(".js-clone-nav");
    var siteMobileMenuBody = document.querySelector(".site-mobile-menu-body");

    jsCloneNavs.forEach((nav) => {
      var navCloned = nav.cloneNode(true);
      navCloned.setAttribute("class", "site-nav-wrap");
      siteMobileMenuBody.appendChild(navCloned);
    });

    setTimeout(function () {
      var hasChildrens = document
        .querySelector(".site-mobile-menu")
        .querySelectorAll(" .has-children");

      var counter = 0;
      hasChildrens.forEach((hasChild) => {
        var refEl = hasChild.querySelector("a");

        var newElSpan = document.createElement("span");
        newElSpan.setAttribute("class", "arrow-collapse collapsed");

        // prepend equivalent to jquery
        hasChild.insertBefore(newElSpan, refEl);

        var arrowCollapse = hasChild.querySelector(".arrow-collapse");
        arrowCollapse.setAttribute("data-bs-toggle", "collapse");
        arrowCollapse.setAttribute("data-bs-target", "#collapseItem" + counter);

        var dropdown = hasChild.querySelector(".dropdown");
        dropdown.setAttribute("class", "collapse");
        dropdown.setAttribute("id", "collapseItem" + counter);

        counter++;
      });
    }, 1000);

    // Click js-menu-toggle

    var menuToggle = document.querySelectorAll(".js-menu-toggle");
    var mTog;
    menuToggle.forEach((mtoggle) => {
      mTog = mtoggle;
      mtoggle.addEventListener("click", (e) => {
        if (document.body.classList.contains("offcanvas-menu")) {
          document.body.classList.remove("offcanvas-menu");
          mtoggle.classList.remove("active");
          mTog.classList.remove("active");
        } else {
          document.body.classList.add("offcanvas-menu");
          mtoggle.classList.add("active");
          mTog.classList.add("active");
        }
      });
    });

    var specifiedElement = document.querySelector(".site-mobile-menu");
    var mt, mtoggleTemp;
    document.addEventListener("click", function (event) {
      var isClickInside = specifiedElement.contains(event.target);
      menuToggle.forEach((mtoggle) => {
        mtoggleTemp = mtoggle;
        mt = mtoggle.contains(event.target);
      });

      if (!isClickInside && !mt) {
        if (document.body.classList.contains("offcanvas-menu")) {
          document.body.classList.remove("offcanvas-menu");
          mtoggleTemp.classList.remove("active");
        }
      }
    });
  };
  siteMenuClone();
})()(function () {
  "use strict";
  var siteMenuClone = function () {
    var jsCloneNavs = document.querySelectorAll(".js-clone-nav");
    var siteMobileMenuBody = document.querySelector(".site-mobile-menu-body");
    jsCloneNavs.forEach((nav) => {
      var navCloned = nav.cloneNode(true);
      navCloned.setAttribute("class", "site-nav-wrap");
      siteMobileMenuBody.appendChild(navCloned);
    });
    setTimeout(function () {
      var hasChildrens = document
        .querySelector(".site-mobile-menu")
        .querySelectorAll(" .has-children");
      var counter = 0;
      hasChildrens.forEach((hasChild) => {
        var refEl = hasChild.querySelector("a");
        var newElSpan = document.createElement("span");
        newElSpan.setAttribute("class", "arrow-collapse collapsed");
        // prepend equivalent to jquery
        hasChild.insertBefore(newElSpan, refEl);
        var arrowCollapse = hasChild.querySelector(".arrow-collapse");
        arrowCollapse.setAttribute("data-bs-toggle", "collapse");
        arrowCollapse.setAttribute("data-bs-target", "#collapseItem" + counter);
        var dropdown = hasChild.querySelector(".dropdown");
        dropdown.setAttribute("class", "collapse");
        dropdown.setAttribute("id", "collapseItem" + counter);
        counter++;
      });
    }, 1000);
    // Click js-menu-toggle
    var menuToggle = document.querySelectorAll(".js-menu-toggle");
    var mTog;
    menuToggle.forEach((mtoggle) => {
      mTog = mtoggle;
      mtoggle.addEventListener("click", (e) => {
        if (document.body.classList.contains("offcanvas-menu")) {
          document.body.classList.remove("offcanvas-menu");
          mtoggle.classList.remove("active");
          mTog.classList.remove("active");
        } else {
          document.body.classList.add("offcanvas-menu");
          mtoggle.classList.add("active");
          mTog.classList.add("active");
        }
      });
    });
    var specifiedElement = document.querySelector(".site-mobile-menu");
    var mt, mtoggleTemp;
    document.addEventListener("click", function (event) {
      var isClickInside = specifiedElement.contains(event.target);
      menuToggle.forEach((mtoggle) => {
        mtoggleTemp = mtoggle;
        mt = mtoggle.contains(event.target);
      });
      if (!isClickInside && !mt) {
        if (document.body.classList.contains("offcanvas-menu")) {
          document.body.classList.remove("offcanvas-menu");
          mtoggleTemp.classList.remove("active");
        }
      }
    });
  };
  siteMenuClone();
})();
// khi trang được tải lại, bạn có thể lưu trữ giá trị ngôn ngữ đã chọn vào localStorage
var translations = {
  en: {
    "Trang chủ": "Home",
    "Bài viết": "Posts",
    "Hỏi đáp": "Q&A",
    "Thảo luận": "Discussion",
    "Tìm Kiếm trên Myblog...": "Search on Myblog...",
    "Đăng nhập": "Login",
    "Theo dõi": "Followings",
    "Mới nhất": "Newest",
    Sửa: "Fix",
    "Trang cá nhân": "Personal page",
    "Quản lý nội dung": "Content management",
    "Lịch sử hoạt động": "Activity history",
    "Đăng xuất": "Log out",
  },
  vi: {
    Home: "Trang chủ",
    Posts: "Bài viết",
    "Q&A": "Hỏi đáp",
    Discussion: "Thảo luận",
    "Search on Myblog...": "Tìm Kiếm trên Myblog...",
    Login: "Đăng nhập",
    Followings: "Theo dõi",
    Newest: "Mới nhất",
    Fix: "Sửa",
    Personal: "Trang cá nhân",
    Content: "Quản lý nội dung",
    Activity: "Lịch sử hoạt động",
    Log: "Đăng xuất",
  },
};
function translate(language) {
  var elements = document.querySelectorAll(".site-menu a, .search-form input");
  elements.forEach(function (element) {
    var text = element.textContent || element.placeholder;
    var translation = translations[language][text];
    if (translation) {
      if (element.tagName === "A") {
        element.textContent = translation;
      } else if (element.tagName === "INPUT") {
        element.placeholder = translation;
      }
    }
  });
}
document
  .getElementById("language-select")
  .addEventListener("change", function () {
    var language = this.value;
    localStorage.setItem("language", language);
    translate(language);
  });
window.onload = function () {
  var language = localStorage.getItem("language") || "en";
  document.getElementById("language-select").value = language;
  translate(language);
};
