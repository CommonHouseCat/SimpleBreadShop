function bread_search() {
    const testBreadName = document.getElementById('header__search-input').value.trim();

    if (testBreadName === "") {
        var resultSearchList = document.getElementById('header__search-list');
        resultSearchList.innerHTML = ""; // Xóa nội dung cũ
        var noResult = document.createElement('li');
        noResult.classList.add('header__search-result-item');
        noResult.textContent = "Không có kết quả tìm kiếm";
        resultSearchList.appendChild(noResult);
        return;
    }

    let testURL = "http://localhost/CT214H/resultSearch.php?breadname=" + testBreadName;
    fetch(testURL)
        .then(response => response.json())
        .then(
            data => {
                console.log(data);
                var resultSearchList = document.getElementById('header__search-list');
                resultSearchList.innerHTML = ""; // Xóa nội dung cũ

                if (data.length > 0) {
                    data.forEach(bread => {
                        var listItem = document.createElement('li');
                        listItem.classList.add('header__search-result-item');
                        var link = document.createElement('a');
                        link.textContent = bread.bread_name; // Thay thế bookName bằng tên cột tương ứng trong dữ liệu
                        listItem.appendChild(link);
                        resultSearchList.appendChild(listItem);
                    });
                } else {
                    var noResult = document.createElement('li');
                    noResult.classList.add('header__search-result-item');
                    noResult.textContent = "Không có kết quả tìm kiếm";
                    resultSearchList.appendChild(noResult);
                }
            }
        );
}

function showResultSearch() {
    document.querySelector('.header__search-result').computedStyleMap.display = 'flex';
}
