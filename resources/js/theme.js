export function setTheme(theme) {
    const icon = document.getElementById('themeIcon');
    const text = document.getElementById('themeText');

    // simpan ke localStorage
    localStorage.setItem('theme', theme);

    // apply ke <html>
    document.documentElement.classList.toggle('dark', theme === 'dark');

    // update UI
    if (icon) icon.innerText = theme === 'dark' ? '☀️' : '🌙';
    if (text) text.innerText = theme === 'dark' ? 'Light Mode' : 'Dark Mode';
}

export function toggleTheme(e) {
    if (e) e.preventDefault();

    const isDark = document.documentElement.classList.contains('dark');
    setTheme(isDark ? 'light' : 'dark');
}

export function initTheme() {
    const saved = localStorage.getItem('theme');

    if (saved) {
        setTheme(saved);
    } else {
        setTheme(window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light');
    }
}
