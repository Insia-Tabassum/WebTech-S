// Dynamic project data
const projects = [
  {
    title: "Portfolio Website",
    description: "A personal portfolio website to showcase skills and projects.",
    image: "/Portfolio Web.jpg",
    link: "#",
    category: "web"
  },
  {
    title: "Task Manager App",
    description: "A simple app to manage daily tasks and improve productivity.",
    image: "/Task-manager-apps.jpg",
    link: "#",
    category: "app"
  },
  {
    title: "Creative Poster Design",
    description: "A modern poster design project for a fictional event campaign.",
    image: "/Poster design.jpg",
    link: "#",
    category: "design"
  },
  {
    title: "E-commerce Website",
    description: "A responsive shopping website with product cards and cart UI.",
    image: "/E-Commerce website.jpg",
    link: "#",
    category: "web"
  }
];

// Render projects dynamically
const projectContainer = document.getElementById("project-container");

function displayProjects(filter) {
  projectContainer.innerHTML = "";

  const filteredProjects =
    filter === "all"
      ? projects
      : projects.filter(project => project.category === filter);

  filteredProjects.forEach(project => {
    const card = document.createElement("div");
    card.classList.add("project-card");

    card.innerHTML = `
      <img src="${project.image}" alt="${project.title}">
      <div class="project-content">
        <h3>${project.title}</h3>
        <p>${project.description}</p>
        <a href="${project.link}" target="_blank">View Project</a>
      </div>
    `;

    projectContainer.appendChild(card);
  });
}

displayProjects("all");

// Filter buttons
const filterButtons = document.querySelectorAll(".filter-btn");

filterButtons.forEach(button => {
  button.addEventListener("click", () => {
    document.querySelector(".filter-btn.active").classList.remove("active");
    button.classList.add("active");
    displayProjects(button.dataset.filter);
  });
});

// Dark/Light mode toggle with localStorage
const themeToggle = document.getElementById("theme-toggle");

if (localStorage.getItem("theme") === "dark") 
    {
         document.body.classList.add("dark-mode");
         themeToggle.textContent = "☀️";
    }

themeToggle.addEventListener("click", () => {
  document.body.classList.toggle("dark-mode");

  if (document.body.classList.contains("dark-mode")) 
    {
    localStorage.setItem("theme", "dark");
    themeToggle.textContent = "☀️";
    } 
    else {
    localStorage.setItem("theme", "light");
    themeToggle.textContent = "🌙";
    }
});

// Form validation
const form = document.getElementById("contact-form");

form.addEventListener("submit", function (e) {
  e.preventDefault();

  let isValid = true;

  const name = document.getElementById("name").value.trim();
  const email = document.getElementById("email").value.trim();
  const subject = document.getElementById("subject").value.trim();
  const message = document.getElementById("message").value.trim();

  document.getElementById("name-error").textContent = "";
  document.getElementById("email-error").textContent = "";
  document.getElementById("subject-error").textContent = "";
  document.getElementById("message-error").textContent = "";
  document.getElementById("success-message").textContent = "";

  if (name === "") 
    {
        document.getElementById("name-error").textContent = "Name is required.";
        isValid = false;
    
    }

  if (email === "") 
    {
       document.getElementById("email-error").textContent = "Email is required.";
       isValid = false;
   } 
   else if (!validateEmail(email))
     {
    document.getElementById("email-error").textContent = "Enter a valid email.";
    isValid = false;
     }

  if (subject === "") 
    {
        document.getElementById("subject-error").textContent = "Subject is required.";
        isValid = false;
    
    }

  if (message === "") {
    document.getElementById("message-error").textContent = "Message is required.";
    isValid = false;
  }

  if (isValid) 
    {
    document.getElementById("success-message").textContent =
      "Form submitted successfully!";
    form.reset();
    }
});

function validateEmail(email) {
  const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return regex.test(email);
}

// Typing animation
const typingText = document.getElementById("typing-text");
const words = ["a Web Developer", "a Student", "a Designer"];
let wordIndex = 0;
let charIndex = 0;
let isDeleting = false;

function typeEffect() {
  const currentWord = words[wordIndex];
  const currentText = currentWord.substring(0, charIndex);
  typingText.textContent = currentText;

  if (!isDeleting && charIndex < currentWord.length) {
    charIndex++;
    setTimeout(typeEffect, 120);
  } else if (isDeleting && charIndex > 0) {
    charIndex--;
    setTimeout(typeEffect, 60);
  } else {
    isDeleting = !isDeleting;
    if (!isDeleting) {
      wordIndex = (wordIndex + 1) % words.length;
    }
    setTimeout(typeEffect, 900);
  }
}

typeEffect();

// Scroll to top button
const scrollTopBtn = document.getElementById("scroll-top-btn");

window.addEventListener("scroll", () => {
  if (window.scrollY > 300) {
    scrollTopBtn.style.display = "block";
  } else {
    scrollTopBtn.style.display = "none";
  }
});

scrollTopBtn.addEventListener("click", () => {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
  });
});