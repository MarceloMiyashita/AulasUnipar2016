<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"/>
  <xsl:template match="/">
    <xsl:apply-templates select="/rss/channel/item[1]"/>
    <xsl:apply-templates select="/rss/channel/item[contains(title,'Warning')]"/>
  </xsl:template>

  <xsl:template match="item">
    <p>
      <xsl:value-of select="title"/><br/>
      <xsl:value-of disable-output-escaping="yes" select="description"/>
    </p>
  </xsl:template>

  <xsl:template match="item[contains(title,'Warning')]">
    <p>
      <strong><xsl:value-of disable-output-escaping="yes" select="description"/></strong>
    </p>
  </xsl:template>
</xsl:stylesheet>
