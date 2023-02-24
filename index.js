function activePage(pageName){
    if (window.location.search.substr(1) == pageName){
        return "style='color: red;'"
    }
}
