<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"> 
 <xsl:output method="html" encoding="iso-8859-1" indent="no"/>
 <xsl:template match="RtaBuscarArchivo">  
  <xsl:apply-templates/>
 </xsl:template>
 <xsl:template match="Archivo"><xsl:value-of select="@Id"/>||<xsl:value-of select="@Nombre"/>*/* </xsl:template>
</xsl:stylesheet>