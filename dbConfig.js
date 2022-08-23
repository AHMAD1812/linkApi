const config = {
    user: 'link',
    password: 'tlc1985&Going',
    server: 'link-reporting.database.windows.net',
    database: 'reporting',
    options: {
        trustedconnection: true,
        enableArithAbort: true,
        encrypt:true,
        instancename:'SQLEXPRESS'
    },
    pool: {
        max: 10,
        min: 0,
        idleTimeoutMillis: 60000
    }
}

module.exports = config;