document.querySelectorAll('.na').forEach(e => {
    e.addEventListener('mouseenter', () => {
        e.querySelector('.n').style.opacity = '1';
        e.querySelector('.n').style.backdropFilter = 'blur(40px)';
        e.querySelector('.anim').style.transform = 'translateY(0)';
        e.querySelector('.anim').style.opacity = '1';
    });

    e.addEventListener('mouseleave', () => {
        e.querySelector('.n').style.opacity = '0';
        e.querySelector('.n').style.backdropFilter = 'none';
        e.querySelector('.anim').style.transform = 'translateY(150px)';
        e.querySelector('.anim').style.opacity = '0';
    });
});
