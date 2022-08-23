const config = {
    user: 'link',
    password: 'tlc1985&Going',
    server: 'link-reporting.database.windows.net',
    database: 'reporting',
    requestTimeout: 180000, // for timeout setting
    connectionTimeout: 180000, // for
    options: {
        trustedconnection: true,
        enableArithAbort: true,
        encrypt:true,
        instancename:'SQLEXPRESS'
    }
}

module.exports = config;