// Show or Hide Sidebar
function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    
    // Toggle sidebar visibility
    sidebar.classList.toggle('show');
  
    // Toggle icon visibility
    if (sidebar.classList.contains('show')) {
      hamburgerIcon.style.display = 'none';
      closeIcon.style.display = 'inline';
    } else {
      hamburgerIcon.style.display = 'inline';
      closeIcon.style.display = 'none';
    }
  }
  
  // Hide Sidebar
  function hideSidebar() {
    const sidebar = document.getElementById('sidebar');
    const hamburgerIcon = document.getElementById('hamburger-icon');
    const closeIcon = document.getElementById('close-icon');
    
    sidebar.classList.remove('show');
    hamburgerIcon.style.display = 'inline';
    closeIcon.style.display = 'none';
  }
  
//   modal
// Open the modal
function openModal() {
    document.getElementById("downloadModal").style.display = "block";
  }
  
  // Close the modal
  function closeModal() {
    document.getElementById("downloadModal").style.display = "none";
  }
  
  // Close the modal if clicked outside of it
  window.onclick = function (event) {
    const modal = document.getElementById("downloadModal");
    if (event.target === modal) {
      modal.style.display = "none";
    }
  };
  