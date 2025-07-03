const dashboardSection = document.getElementById("dashboard");
const patientsSection = document.getElementById("patients");
const appointmentsSection = document.getElementById("appointments");
const settingsSection = document.getElementById("settings");

const searchBtn = document.getElementById("search-btn");
const searchBar = document.getElementById("search-bar");
const logoutBtn = document.querySelector(".logout a");
const viewDetailsBtns = document.querySelectorAll(".view-details");
const markDoneBtns = document.querySelectorAll(".mark-done");
const markAdmitBtns = document.querySelectorAll(".mark-admit");
const modal = document.querySelector(".popup"); 
const closeBtn = document.getElementById("closePopup");

function hideSections() {
    dashboardSection.classList.add("hidden");
    patientsSection.classList.add("hidden");
    appointmentsSection.classList.add("hidden");
    settingsSection.classList.add("hidden");
}

function showSection(section) {
    hideSections();
    section.classList.remove("hidden");
}

function showPopup() {
    modal.style.display = 'block';
}

function hidePopup() {
    modal.style.display = 'none';
}

const navLinks = document.querySelectorAll("nav ul li a");
navLinks.forEach(link => {
    link.addEventListener("click", (event) => {
        event.preventDefault();
        const targetId = event.target.getAttribute("href").substring(1);
        const targetSection = document.getElementById(targetId);
        showSection(targetSection);
    });
});

searchBtn.addEventListener("click", () => {
    const searchQuery = searchBar.value.toLowerCase();
    const rows = document.querySelectorAll("table tbody tr");
    rows.forEach(row => {
        const name = row.querySelector("td").textContent.toLowerCase();
        if (name.includes(searchQuery)) {
            row.style.display = "";
        } else {
            row.style.display = "none";
        }
    });
});

markDoneBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        btn.textContent = "Done";
        btn.disabled = true;
        btn.style.backgroundColor = "#0386f8";
    });
});

markAdmitBtns.forEach(btn => {
    btn.addEventListener("click", () => {
        btn.textContent = "Admitted";
        btn.disabled = true;
        btn.style.backgroundColor = "orange";
        showPopup(); 
    });
});

closeBtn.addEventListener("click", hidePopup);

window.addEventListener("click", (event) => {
    if (event.target === modal) {
        hidePopup();
    }
});
