var config = require('./dbConfig');
const sql = require('mssql');


async function getUsers() {
    try {
        let conn = await sql.connect(config);
        let users = await conn.request().query("SELECT * FROM SALESREP_ZIPCODE");
        return users.recordsets;
    } catch (err) {
        console.log(err);
    }
}

async function getUser(zip) {
    try {
        let conn = await sql.connect(config);
        let user = await conn.request()
            .input('input_params',sql.Int,zip)
            .query("SELECT * FROM SALESREP_ZIPCODE where ZIPCODE = @input_params");
        return user.recordsets;
    } catch (err) {
        console.log(err);
    }
}

module.exports = {
    getUsers: getUsers,
    getUser:getUser
}