// alert();
let items=[];

function additem(){
    let item_name = document.getElementById("item_name").value;
    let item_price = document.getElementById("item_price").value;
    let item_quantity = document.getElementById("item_quantity").value;

    if(item_name && item_price && item_quantity){
        items.push({
            name: item_name,
            price: parseInt(item_price),
            quantity:item_quantity

        })
        console.log(items)
        showItems();
    }
}

function showItems(){
    const tbody=document.querySelector('#show-table tbody');
    tbody.innerHTML="";
    items.forEach(item=>{
        const tr =document.createElement("tr");
        const nameid=document.createElement("td");
        nameid.innerText=item.name;
        const priceid = document.createElement("td");
        priceid.innerText=item_price;
        const quantityid =document.createElement("td");
        quantityid.innerText=item_quantity;

        tr.appendChild(nameid);
        tr.appendChild(priceid);
        tr.appendChild(quantityid);
        tbody.appendChild(tr);
    })
}