function toggleAdmincontactus(element) {
    const shortAdmincontactus = element.querySelector('.short-admincontactus');
    const fullAdmincontactus = element.querySelector('.full-admincontactus');

    if (shortAdmincontactus.style.display === 'none') {
        shortAdmincontactus.style.display = 'inline';
        fullAdmincontactus.style.display = 'none';
    } else {
        shortAdmincontactus.style.display = 'none';
        fullAdmincontactus.style.display = 'inline';
    }
}