<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet version="1.0"
    xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:output
        indent="yes"
        doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN"
        doctype-system="http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd" />
    <xsl:template match="/">
        <html
            xmlns="http://www.w3.org/1999/xhtml">
            <head>
                <title>Computer catalog</title>
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" />
                <link rel="stylesheet" href="https://cedricvb.be/wp-content/pages/xslt/catalog.css" />
            </head>
            <body class="">
                <div class="box">
                    <h1 class="well">
                        <i class="glyphicon glyphicon-list"></i>Archivos procesados
                
                    </h1>
                    <div class="row">
                        <div class="col-lg-12">
                            <table class="table responsive">
                                <thead>
                                    <tr>
                                        <th style="width: 15%" scope="col">Id</th>
                                        <th style="width: 55%" scope="col">Nombre</th>
                                        <th style="width: 15%" scope="col">Extension</th>
                                        <!-- <th style="width: 15%" scope="col">Tipo</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <xsl:for-each select="resultados/item">
                                        <tr>
                                            <th scope="row">
                                                <xsl:value-of select="id"/>
                                            </th>
                                            <td>
                                                <xsl:value-of select="name"/>
                                            </td>
                                            <td>
                                                <xsl:value-of select="extension"/>
                                            </td>
                                            <!-- <td>
                                                <xsl:value-of select="file_type"/>
                                            </td> -->
                                        </tr>
                                    </xsl:for-each>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>