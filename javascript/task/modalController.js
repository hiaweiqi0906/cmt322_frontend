// Open the modal
const taskModal_openModal = (id='multiTaskModal') => {
    const modalElement = document.getElementById(id);
    let modal = bootstrap.Modal.getInstance(modalElement);
  
    if (!modal) {
      // If modal instance doesn't exist, create a new one
      modal = new bootstrap.Modal(modalElement);
    }
  
    modal.show();
  }
  
  
  // Close the modal
  const taskModal_closeModal = (id='multiTaskModal') => {
    const modalElement = document.getElementById(id);
    const modal = bootstrap.Modal.getInstance(modalElement);
    modal.hide();
  }
  
  
  // Set the modal title
  const taskModal_setModalTitle = (modalTitleID, titleContent) => {
    const modalTitleEl = document.getElementById(modalTitleID);   
    modalTitleEl.textContent = titleContent;      // Set the title text
  }
  
  
  // Set the Save Button (it might be different content like 'Save' or 'Accept')
  const taskModal_setSaveButton = (saveButtonID, buttonText, isDisable, classNames) => {
    const saveButtonEl = document.getElementById(saveButtonID);
    saveButtonEl.innerText = buttonText;
    saveButtonEl.disabled = isDisable;
    saveButtonEl.className = '';
  
    classNames.forEach(className => {
      saveButtonEl.classList.add(className);
    })
    
  }
  
  
  // Set the Close button (it might be different content like 'Close' or 'Cancel' or 'Decline')
  const taskModal_setCloseButton = (closeButtonID, buttonText, isDisable, classNames) => {
    const closeButtonEl = document.getElementById(closeButtonID);
    closeButtonEl.innerText = buttonText;
    closeButtonEl.disabled = isDisable;
    closeButtonEl.className = '';
  
    classNames.forEach(className => {
      closeButtonEl.classList.add(className);
    })
    
  }
  
  
  // When clicking new task button, set the modal title and button style
  const taskModal_setNewTaskModal = (modalTitleID, saveButtonID, closeButtonID) => {
    taskModal_setModalTitle(modalTitleID, 'New Task');
  
    taskModal_setSaveButton(saveButtonID, 'Create', false, ['btn', 'btn-primary', 'save-button']);
  
    taskModal_setCloseButton(closeButtonID, 'Close', false, ['btn', 'btn-light', 'close-button']);
  }
  
  
  // When clicking the task event created by user, show the form that can be edited or cancelled
  const taskModal_setCreatedTaskModal = (modalTitleID, saveButtonID, closeButtonID, needDisable) => {
    taskModal_setModalTitle(modalTitleID, 'Created Task');
  
    taskModal_setSaveButton(saveButtonID, 'Save', needDisable, ['btn', 'btn-primary', 'save-button']);
  
    taskModal_setCloseButton(closeButtonID, 'Cancel', needDisable, ['btn', 'btn-danger', 'shadow']);
  }
  
  
  // To show the alert
  const taskModal_showAlert = (alertID) => {
    document.getElementById(alertID).classList.add('show');
  }
  
  
  // To hide the alert after 5 seconds
  const taskModal_hideAlert = (alertID) => {
    setTimeout( () => {
      document.getElementById(alertID).classList.remove('show');
    }, 3000);
  }
  
  
  // To call alert function
  const taskModal_callAlert = (alertID) => {
    taskModal_showAlert(alertID);
    taskModal_hideAlert(alertID);
  }