const express = require('express');
const bodyParser = require('body-parser');
const mysql = require('mysql2');
const path = require('path');

const app = express();

app.use(bodyParser.urlencoded({ extended: true }));
app.use(express.static('public'));
app.set('view engine', 'ejs');
app.set('views', path.join(__dirname, 'views'));

const db = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: 'Andres123.',
    database: 'construccion_db'
});

db.connect((err) => {
    if (err) {
        console.log('Error de conexión:', err);
    } else {
        console.log('Conectado a MySQL');
    }
});

app.get('/', (req, res) => {
    res.render('index', { resultado: null });
});

app.post('/calcular', (req, res) => {
    const { largo, ancho, alto, costoCemento, costoArena, costoBlock } = req.body;

    const area = parseFloat(largo) * parseFloat(ancho);
    const volumen = area * parseFloat(alto);

    const cemento = volumen * 5;
    const arena = volumen * 0.5;
    const block = area * 12;

    const total =
        (cemento * parseFloat(costoCemento)) +
        (arena * parseFloat(costoArena)) +
        (block * parseFloat(costoBlock));

    const sql = `
        INSERT INTO calculos
        (largo, ancho, alto, cemento, arena, blockes, total)
        VALUES (?, ?, ?, ?, ?, ?, ?)
    `;

    db.query(
        sql,
        [largo, ancho, alto, cemento, arena, block, total],
        (err) => {
            if (err) {
                console.log(err);
            }
        }
    );

    res.render('index', {
        resultado: {
            area,
            volumen,
            cemento,
            arena,
            block,
            total
        }
    });
});

app.listen(3000, () => {
    console.log('Servidor ejecutándose en http://localhost:3000');
});