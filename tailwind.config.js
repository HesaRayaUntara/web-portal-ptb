module.exports = {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#006837',
                primaryDark: '#055631',
                primaryLight: '#23905a',
                secondary: '#1a7431',
                accent: '#f4f9f1',
                textDark: '#1c2a28',
                textMuted: '#6a7d76',
                body: '#f2f5f1',
            },
            boxShadow: {
                soft: '0 4px 20px rgba(0, 0, 0, 0.08)',
                card: '0 16px 30px rgba(0, 0, 0, 0.12)',
                button: '0 12px 24px rgba(12, 139, 76, 0.18)',
                photo: '0 12px 30px rgba(0, 0, 0, 0.28)',
            },
            borderRadius: {
                section: '20px',
                card: '16px',
                badge: '10px',
                footer: '24px',
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
            },
            fontSize: {
                15: ['0.9375rem', { lineHeight: '1.6' }],
                17: ['1.0625rem', { lineHeight: '1.6' }],
                22: ['1.375rem', { lineHeight: '1.4' }],
            },
            maxWidth: {
                content: '1180px',
            },
            spacing: {
                '14px': '14px',
                '18px': '18px',
                '22px': '22px',
                '26px': '26px',
                '30px': '30px',
                '34px': '34px',
                '40px': '40px',
                '42px': '42px',
                '46px': '46px',
                '54px': '54px',
                '60px': '60px',
                '70px': '70px',
                '72px': '72px',
            },
            letterSpacing: {
                wide4: '4px',
                wider2: '2px',
            },
        },
    },
    plugins: [],
};

