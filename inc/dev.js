var arr = []; // Array to hold the keys
// Iterate over localStorage and insert the keys that meet the condition into arr
for (var i = 0; i < localStorage.length; i++){
    if (localStorage.key(i).substring(0,16) == 'et_pb_templates_') {
        arr.push(localStorage.key(i));
    }
}

// Iterate over arr and remove the items by key
for (var i = 0; i < arr.length; i++) {
    localStorage.removeItem(arr[i]);
}
