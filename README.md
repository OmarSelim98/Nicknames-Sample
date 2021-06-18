<ul>
    <li>
        In directory elastic/migartions, you can find a custom way to migrate indecies, however, elastic scout driver automatically creates indices for all the models with the "searchable" trait.
    </li>
    <li>
        In directory pipeline, sql.conf is a configuration file for logstash,
        (which is not added to the docker file), but it was added for custom db to elasticsearch syncronization.
        The lib folder contains JDBC which is the main connection driver between Mysql DB and logstash.
    </li>
</ul>