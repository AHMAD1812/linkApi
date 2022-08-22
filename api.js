const dbOperation = require('./dbOperation');

const express = require('express');
const bodyParser = require('body-parser');
const cors = require('cors');
const app = express();
const router = express.Router();

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
app.use(cors());
app.use('/api', router);


router.use((req, res, next) => {
    next();
});

router.route("/users").get((req, res) => {
    dbOperation.getUsers().then(result => {
        res.json(result[0]);
    });
});

router.route("/user/:zip").get((req, res) => {
    dbOperation.getUser(req.params.zip).then(result => {
        res.json(result[0]);
    });
});

var port = process.env.PORT || 8090;
app.listen(port);
