const idInput = document.getElementById("id-input");
const searchBtn = document.getElementById("search-btn");
const tableBody = document.getElementById("table-body");
let users = JSON.parse(localStorage.getItem("users")) || [];
const validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

function renderTable() {
    tableBody.innerHTML = "";
    for (let i = 0; i < users.length; i++) {
        const user = users[i];
        const tr = document.createElement("tr");
        const idTd = document.createElement("td");
        const nameTd = document.createElement("td");
        const emailTd = document.createElement("td");
        const actionsTd = document.createElement("td");
        const deleteBtn = document.createElement("button");
        deleteBtn.className = "btn btn-delete btn-custom";
        const validateBtn = document.createElement("button");
        validateBtn.className = "btn btn-validate btn-custom";
        idTd.innerText = user.id;
        nameTd.innerText = user.name;
        emailTd.innerText = user.email;
        deleteBtn.innerText = "Delete";
        validateBtn.innerText = "Validate";
        deleteBtn.addEventListener("click", () => {
            deleteUser(user.id);
        });
        validateBtn.addEventListener("click", () => {
            validateUser(user.id);
        });
        actionsTd.appendChild(validateBtn);
        actionsTd.appendChild(deleteBtn);
        tr.appendChild(idTd);
        tr.appendChild(nameTd);
        tr.appendChild(emailTd);
        tr.appendChild(actionsTd);
        tableBody.appendChild(tr);
    }
}

function searchUser() {
    const id = parseInt(idInput.value.trim());
    if (id) {
        const user = users.find((user) => user.id === id);
        if (user) {
            tableBody.innerHTML = "";
            const tr = document.createElement("tr");
            const idTd = document.createElement("td");
            const nameTd = document.createElement("td");
            const emailTd = document.createElement("td");
            const actionsTd = document.createElement("td");
            const deleteBtn = document.createElement("button");
            deleteBtn.className = "btn btn-delete btn-custom";
            const validateBtn = document.createElement("button");
            validateBtn.className = "btn btn-validate btn-custom";
            idTd.innerText = user.id;
            nameTd.innerText = user.name;
            emailTd.innerText = user.email;
            deleteBtn.innerText = "Delete";
            validateBtn.innerText = "Validate";
            deleteBtn.addEventListener("click", () => {
                deleteUser(user.id);
            });
            validateBtn.addEventListener("click", () => {
                validateUser(user.id);
            });
            actionsTd.appendChild(validateBtn);
            actionsTd.appendChild(deleteBtn);
            tr.appendChild(idTd);
            tr.appendChild(nameTd);
            tr.appendChild(emailTd);
            tr.appendChild(actionsTd);
            tableBody.appendChild(tr);
        } else {
            alert("User not found!");
        }
    } else {
        alert("Please enter a valid ID.");
    }
}

function deleteUser(userId) {
    users = users.filter((user) => user.id !== userId);
    localStorage.setItem("users", JSON.stringify(users));
    renderTable();
}

function validateUser(userId) {
    const user = users.find((user) => user.id === userId);
    if (user) {
        if (user.email.match(validRegex)) {
            alert(`User ID: ${user.id} has a valid email.`);
        } else {
            alert(`User ID: ${user.id} has an invalid email.`);
        }
    }
}

searchBtn.addEventListener("click", searchUser);

renderTable();