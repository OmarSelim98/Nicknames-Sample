<ul>
    <li>
        In directory elastic/migartions, you can find a custom way to migrate indecies, however, elastic scout driver automatically creates indices for all the models with the "searchable" trait.
    </li>
    <li>
        In directory pipeline, sql.conf is a configuration file for logstash,
        (which is not added to the docker file), but it was added for custom db to elasticsearch syncronization.
        The lib folder contains JDBC which is the main connection driver between Mysql DB and logstash.
    </li>
    <li>
        Saving contacts functionality is all setup, with a command file (ContactsToDB), which can be run directly from the CLI, initially it's configured to be every minute for testing and monitoring causes, but it can be easily customized to any other interval.
    </li>
    <li>
        Api:
            <ol>
                <li style="font-weight:bold;">
                    api/v1/saveContacts
                    body:
                        {
                            contacts:[{
                                name:"X",
                                email:"X@X.X",
                                phone:"XXXXXXXXXXXX"
                            }]
                        }
                <li>
            </ol>
            
    </li>
</ul>
