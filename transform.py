#!/usr/bin/env python3
"""
TDOT Immigration Website Transformation Script
Handles Tasks 1, 2, and 3.
"""

import re
import os

BASE = "/Users/muhammad/Downloads/tdot-immigration-website"

# ─────────────────────────────────────────────
# SHARED CONTENT BLOCKS
# ─────────────────────────────────────────────

NEW_FOOTER = """    <footer class="site-footer">
      <div class="container footer-grid">
        <div>
          <div class="footer-brand">
            <img src="https://d2xsxph8kpxj0f.cloudfront.net/310519663445981057/PSTjQftXscFTwvxzvYYugT/tdot-logo-footer-white-trimmed_3ffe498c.png" alt="TDOT Immigration logo" width="220" height="81" loading="lazy" />
            <p>Canada's trusted immigration consultants. CICC licensed. IRB authorized.</p>
          </div>
          <div class="footer-badges">
            <span class="footer-badge">CICC Licensed</span>
            <span class="footer-badge">IRB Authorized</span>
            <span class="footer-badge">10,000+ Applications</span>
          </div>
        </div>
        <div>
          <h3>Services</h3>
          <ul>
            <li><a href="/services/express-entry.html">Express Entry</a></li>
            <li><a href="/services/provincial-nominee.html">Provincial Nominee Program</a></li>
            <li><a href="/services/citizenship.html">Citizenship</a></li>
            <li><a href="/services/study-permit.html">Study Permit</a></li>
            <li><a href="/services/work-permit.html">Work Permit</a></li>
            <li><a href="/services/visitor-visa.html">Visitor Visa</a></li>
            <li><a href="/services/temporary-resident-permit.html">Temporary Resident Permit</a></li>
            <li><a href="/services/business-visa.html">Business Visa</a></li>
            <li><a href="/services/investor-visa.html">Investor Visa</a></li>
            <li><a href="/services/family-sponsorship.html">Family Sponsorship</a></li>
            <li><a href="/services/inadmissibility.html">Inadmissibility &amp; Refusals</a></li>
          </ul>
        </div>
        <div>
          <h3>Company</h3>
          <ul>
            <li><a href="/index.html">Home</a></li>
            <li><a href="/about.html">About Us</a></li>
            <li><a href="/blog/index.html">Blog</a></li>
            <li><a href="/contact.html">Contact</a></li>
          </ul>
        </div>
        <div>
          <h3>Get in Touch</h3>
          <ul class="footer-contact-list">
            <li>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
              <a href="https://maps.google.com/?q=1060+Sheppard+Ave+W+Unit+4+Toronto+ON+M3J+0G7" target="_blank" rel="noopener noreferrer">1060 Sheppard Ave W, Unit 4<br>Toronto, ON M3J 0G7</a>
            </li>
            <li>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.42 2 2 0 0 1 3.6 1.25h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.97-.97a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
              <a href="tel:+14169476710">416-947-6710</a>
            </li>
            <li>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
              <a href="mailto:info@tdotimm.com">info@tdotimm.com</a>
            </li>
            <li>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" aria-hidden="true"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
              <span>Mon–Fri, 9AM–6PM EST</span>
            </li>
          </ul>
          <div class="social-row social-row-footer" aria-label="TDOT Immigration on social media">
            <a href="https://instagram.com/tdotimm" target="_blank" rel="noopener noreferrer" aria-label="Instagram"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="2" width="20" height="20" rx="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg></a>
            <a href="https://facebook.com/tdotimm" target="_blank" rel="noopener noreferrer" aria-label="Facebook"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg></a>
            <a href="https://ca.linkedin.com/company/tdotimm" target="_blank" rel="noopener noreferrer" aria-label="LinkedIn"><svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6z"/><rect x="2" y="9" width="4" height="12"/><circle cx="4" cy="4" r="2"/></svg></a>
            <a href="https://x.com/tdotimm" target="_blank" rel="noopener noreferrer" aria-label="Twitter/X"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-4.714-6.231-5.401 6.231H2.744l7.736-8.845L1.254 2.25H8.08l4.259 5.63zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg></a>
            <a href="https://tiktok.com/@tdotimm" target="_blank" rel="noopener noreferrer" aria-label="TikTok"><svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M19.59 6.69a4.83 4.83 0 0 1-3.77-4.25V2h-3.45v13.67a2.89 2.89 0 0 1-2.88 2.5 2.89 2.89 0 0 1-2.89-2.89 2.89 2.89 0 0 1 2.89-2.89c.28 0 .54.04.79.1V9.01a6.33 6.33 0 0 0-.79-.05 6.34 6.34 0 0 0-6.34 6.34 6.34 6.34 0 0 0 6.34 6.34 6.34 6.34 0 0 0 6.33-6.34V9.05a8.16 8.16 0 0 0 4.77 1.52V7.12a4.85 4.85 0 0 1-1-.43z"/></svg></a>
          </div>
        </div>
      </div>
      <div class="footer-bar">
        <div class="container footer-bar-inner">
          <p>© 2025 TDOT Immigration Services. All rights reserved. CICC Licensed Member. | Services en français disponibles</p>
        </div>
      </div>
    </footer>"""

PRE_FOOTER = """    <!-- ══ Pre-footer CTA Strip ══ -->
    <section class="pre-footer" aria-label="Call to action">
      <div class="container pre-footer-inner">
        <div class="pre-footer-copy">
          <h2>Ready to start your Canadian journey?</h2>
          <p>Our CICC-licensed consultants are available for a free, no-obligation assessment of your case.</p>
        </div>
        <div class="pre-footer-actions">
          <a class="button button-light btn-magnetic" href="/contact.html">Book Free Consultation</a>
          <a class="pre-footer-phone" href="tel:+14169476710">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" aria-hidden="true"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.63 3.42 2 2 0 0 1 3.6 1.25h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.82a16 16 0 0 0 6.29 6.29l.97-.97a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
            416-947-6710
          </a>
        </div>
      </div>
    </section>"""

# ─────────────────────────────────────────────
# TASK 1: Remove Locations from nav/footer
# ─────────────────────────────────────────────

def remove_locations_nav(html):
    """Remove Locations li block from desktop nav (nav-group with Locations button)."""
    # Pattern for the "Locations" nav-group li block in the mega-nav style
    # This covers both: <li class="nav-group"> with Locations button
    # Multiline removal - find the <li class="nav-group"> that contains "Locations"

    # Pattern 1: Full expanded nav-group block with Locations (service pages style)
    pattern1 = re.compile(
        r'\s*<li class="nav-group">\s*\n\s*<button[^>]*>\s*\n\s*Locations.*?</li>\s*(?=\n)',
        re.DOTALL
    )
    html = pattern1.sub('', html)

    # Pattern 2: compact one-liner style locations nav-group (location/blog pages)
    # <li class="nav-group"> ... Areas We Serve ... </li> or Locations
    pattern2 = re.compile(
        r'\s*<li class="nav-group">\s*<button[^>]*>(?:Areas We Serve|Locations)</button>\s*<div[^>]*>\s*<ul>[^<]*(?:<li>[^<]*</li>[^<]*)*</ul>\s*</div>\s*</li>',
        re.DOTALL
    )
    html = pattern2.sub('', html)

    return html


def remove_locations_mobile(html):
    """Remove Locations li block from mobile overlay."""
    # Pattern: <li>\n<button ... data-mobile-toggle="mob-locations"> ... </li>
    pattern = re.compile(
        r'\s*<li>\s*\n\s*<button[^>]*data-mobile-toggle="mob-locations"[^>]*>.*?</li>\s*(?=\n)',
        re.DOTALL
    )
    html = pattern.sub('', html)
    return html


def remove_locations_footer(html):
    """Remove Locations h3+ul from footer and location links from Company ul."""
    # Remove <h3 ...>Locations</h3> followed by its <ul>
    pattern_h3 = re.compile(
        r'\s*<h3[^>]*>Locations</h3>\s*<ul>.*?</ul>',
        re.DOTALL
    )
    html = pattern_h3.sub('', html)

    # Remove location links from Company ul (toronto, north-york, mississauga, brampton, vaughan)
    loc_links = [
        r'\s*<li><a href="/locations/toronto\.html">Toronto</a></li>',
        r'\s*<li><a href="/locations/north-york\.html">North York</a></li>',
        r'\s*<li><a href="/locations/mississauga\.html">Mississauga</a></li>',
        r'\s*<li><a href="/locations/brampton\.html">Brampton</a></li>',
        r'\s*<li><a href="/locations/vaughan\.html">Vaughan</a></li>',
    ]
    for pat in loc_links:
        html = re.sub(pat, '', html)

    return html


# ─────────────────────────────────────────────
# TASK 2: Update old footer to new footer format
# ─────────────────────────────────────────────

def needs_footer_update(html):
    """Return True if the page does NOT have the new pre-footer section."""
    return 'class="pre-footer"' not in html


def replace_old_footer(html):
    """
    Replace old footer (from <footer class="site-footer"> to </footer>)
    with pre-footer + new footer. Works even if pre-footer already present.
    """
    # Find the footer block and replace it entirely
    # We need to replace everything from <footer class="site-footer"> to </footer>
    footer_pattern = re.compile(
        r'<footer class="site-footer">.*?</footer>',
        re.DOTALL
    )

    replacement = PRE_FOOTER + '\n\n' + NEW_FOOTER

    # Check if pre-footer is already there, just replace footer
    if 'class="pre-footer"' in html:
        # Only replace the footer content, not insert pre-footer again
        html = footer_pattern.sub(NEW_FOOTER, html)
    else:
        # Replace footer with pre-footer + new footer
        html = footer_pattern.sub(replacement, html)

    return html


# ─────────────────────────────────────────────
# TASK 3: Service page graphics
# ─────────────────────────────────────────────

SERVICE_DATA = {
    "express-entry.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="100" cy="100" r="88" stroke="currentColor" stroke-width="2" stroke-opacity="0.15"/>
  <path d="M30 140 A80 80 0 0 1 170 140" stroke="currentColor" stroke-width="6" stroke-linecap="round" stroke-opacity="0.2"/>
  <path d="M30 140 A80 80 0 0 1 135 48" stroke="currentColor" stroke-width="6" stroke-linecap="round"/>
  <circle cx="135" cy="48" r="8" fill="#C0272D"/>
  <line x1="100" y1="140" x2="128" y2="58" stroke="#C0272D" stroke-width="4" stroke-linecap="round"/>
  <circle cx="100" cy="140" r="10" fill="currentColor"/>
  <text x="100" y="170" text-anchor="middle" font-size="14" font-weight="700" fill="currentColor" font-family="serif">CRS SCORE</text>
  <text x="38" y="148" font-size="10" fill="currentColor" opacity="0.5">0</text>
  <text x="156" y="148" font-size="10" fill="currentColor" opacity="0.5">1200</text>
</svg>""",
        "stats": [
            ("6–12", "months avg processing"),
            ("3", "federal programs"),
            ("95%", "TDOT approval rate"),
        ],
        "pathway": [
            ("01", "Profile Creation", "Build your Express Entry profile with accurate credentials and work history."),
            ("02", "Pool Entry", "Enter the pool and wait for IRCC invitation based on CRS score."),
            ("03", "Draw & ITA", "Receive Invitation to Apply through general or category draw."),
            ("04", "Document Submission", "Submit all supporting documents within the 60-day window."),
            ("05", "PR Approved", "Receive Confirmation of Permanent Residence and land in Canada."),
        ],
    },
    "study-permit.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <polygon points="100,30 180,75 100,120 20,75" stroke="currentColor" stroke-width="4" stroke-linejoin="round" fill="currentColor" fill-opacity="0.08"/>
  <path d="M55 93 L55 145 Q100 165 145 145 L145 93" stroke="currentColor" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
  <line x1="180" y1="75" x2="180" y2="120" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
  <circle cx="180" cy="126" r="8" fill="#C0272D"/>
  <path d="M92 52 L92 40 Q100 34 108 40 L108 52" stroke="#C0272D" stroke-width="3" fill="none"/>
</svg>""",
        "stats": [
            ("8–12 wk", "avg processing"),
            ("40+", "countries served"),
            ("95%", "approval rate"),
        ],
        "pathway": [
            ("01", "School Acceptance", "Obtain your acceptance letter from a Designated Learning Institution."),
            ("02", "TDOT Review", "We review your profile, financials, and ties to home country."),
            ("03", "Application Filed", "Submit your study permit application online with full documentation."),
            ("04", "Biometrics & Medical", "Complete biometrics and any required medical examinations."),
            ("05", "Permit Issued", "Receive your study permit and prepare for departure to Canada."),
        ],
    },
    "work-permit.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect x="30" y="80" width="140" height="100" rx="10" stroke="currentColor" stroke-width="4"/>
  <path d="M75 80 V65 Q75 50 100 50 Q125 50 125 65 V80" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
  <line x1="30" y1="115" x2="170" y2="115" stroke="currentColor" stroke-width="3" stroke-opacity="0.3"/>
  <circle cx="100" cy="115" r="14" stroke="#C0272D" stroke-width="3"/>
  <circle cx="100" cy="115" r="5" fill="#C0272D"/>
  <path d="M100 101 V95 M100 129 V135 M86 115 H80 M120 115 H114" stroke="#C0272D" stroke-width="3" stroke-linecap="round"/>
</svg>""",
        "stats": [
            ("4–16 wk", "processing"),
            ("Open & Closed", "permit types"),
            ("LMIA", "guidance included"),
        ],
        "pathway": [
            ("01", "Employer Verification", "Confirm employer eligibility and LMIA requirements."),
            ("02", "LMIA Assessment", "Determine if a Labour Market Impact Assessment is required."),
            ("03", "Application Prep", "Prepare all supporting documents and employer letters."),
            ("04", "Submission", "File your work permit application with IRCC."),
            ("05", "Permit Received", "Receive your work permit and begin employment in Canada."),
        ],
    },
    "family-sponsorship.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="70" cy="70" r="28" stroke="currentColor" stroke-width="4"/>
  <circle cx="130" cy="70" r="28" stroke="currentColor" stroke-width="4"/>
  <path d="M22 170 Q22 130 70 130 Q100 130 100 130 Q100 130 130 130 Q178 130 178 170" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
  <path d="M100 55 C100 55 88 42 80 50 C72 58 100 75 100 75 C100 75 128 58 120 50 C112 42 100 55 100 55Z" fill="#C0272D" fill-opacity="0.85"/>
</svg>""",
        "stats": [
            ("12–24 mo", "sponsor processing"),
            ("Spouse & Parents", "covered"),
            ("100%", "document review"),
        ],
        "pathway": [
            ("01", "Eligibility Check", "Confirm sponsor meets income and residency requirements."),
            ("02", "Sponsor Application", "File the sponsorship undertaking with IRCC."),
            ("03", "Sponsored App", "Submit the sponsored person's permanent residence application."),
            ("04", "Medicals & Biometrics", "Complete required health and identity checks."),
            ("05", "Reunited", "Receive PR approval and welcome your family to Canada."),
        ],
    },
    "business-visa.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="100" cy="95" r="65" stroke="currentColor" stroke-width="3" stroke-opacity="0.2"/>
  <ellipse cx="100" cy="95" rx="65" ry="25" stroke="currentColor" stroke-width="2" stroke-opacity="0.15"/>
  <line x1="35" y1="95" x2="165" y2="95" stroke="currentColor" stroke-width="2" stroke-opacity="0.15"/>
  <line x1="100" y1="30" x2="100" y2="160" stroke="currentColor" stroke-width="2" stroke-opacity="0.15"/>
  <polyline points="40,150 70,120 100,100 130,75 160,50" stroke="#C0272D" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
  <circle cx="160" cy="50" r="7" fill="#C0272D"/>
  <polyline points="148,50 160,38 172,50" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
</svg>""",
        "stats": [
            ("C$150K+", "typical investment"),
            ("3+ yr", "experience required"),
            ("Multiple", "pathways"),
        ],
        "pathway": [
            ("01", "Business Assessment", "Review your business background and immigration eligibility."),
            ("02", "Document Preparation", "Compile business plans, financials, and personal history."),
            ("03", "Application Filed", "Submit your business visa application to IRCC."),
            ("04", "IRCC Review", "IRCC evaluates your business case and economic contribution."),
            ("05", "Visa Issued", "Receive approval and travel to Canada to establish your business."),
        ],
    },
    "investor-visa.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <ellipse cx="100" cy="155" rx="60" ry="16" stroke="currentColor" stroke-width="3"/>
  <rect x="40" y="130" width="120" height="25" rx="5" stroke="currentColor" stroke-width="3"/>
  <ellipse cx="100" cy="130" rx="60" ry="16" stroke="currentColor" stroke-width="3" fill="currentColor" fill-opacity="0.05"/>
  <rect x="40" y="105" width="120" height="25" rx="5" stroke="currentColor" stroke-width="3"/>
  <ellipse cx="100" cy="105" rx="60" ry="16" stroke="currentColor" stroke-width="3" fill="currentColor" fill-opacity="0.05"/>
  <rect x="40" y="80" width="120" height="25" rx="5" stroke="currentColor" stroke-width="3"/>
  <ellipse cx="100" cy="80" rx="60" ry="16" stroke="currentColor" stroke-width="3" fill="currentColor" fill-opacity="0.06"/>
  <path d="M100 45 L106 60 L122 60 L110 70 L115 85 L100 76 L85 85 L90 70 L78 60 L94 60 Z" fill="#C0272D" fill-opacity="0.9"/>
</svg>""",
        "stats": [
            ("SUV & PNP", "pathways"),
            ("$500K+", "net worth typical"),
            ("Permanent", "residency goal"),
        ],
        "pathway": [
            ("01", "Financial Assessment", "Review net worth, liquid assets, and investment capacity."),
            ("02", "Program Selection", "Identify the right investor pathway — SUV, PNP, or other."),
            ("03", "Business Plan", "Prepare a compliant business plan and financial projections."),
            ("04", "Application", "Submit investor visa application with full documentation."),
            ("05", "PR Approved", "Receive permanent residence upon satisfying investment conditions."),
        ],
    },
    "inadmissibility.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M100 25 L170 55 L170 110 Q170 160 100 185 Q30 160 30 110 L30 55 Z" stroke="currentColor" stroke-width="4" stroke-linejoin="round"/>
  <line x1="100" y1="75" x2="100" y2="155" stroke="#C0272D" stroke-width="3" stroke-linecap="round"/>
  <line x1="65" y1="90" x2="135" y2="90" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
  <circle cx="65" cy="90" r="3" fill="currentColor"/>
  <circle cx="135" cy="90" r="3" fill="currentColor"/>
  <path d="M52 90 L52 105 Q52 118 65 118 Q78 118 78 105 L78 90" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"/>
  <path d="M122 90 L122 110 Q122 118 135 118 Q148 118 148 110 L148 90" stroke="#C0272D" stroke-width="2.5" stroke-linecap="round"/>
</svg>""",
        "stats": [
            ("IRB", "authorized reps"),
            ("Criminal & Health", "grounds covered"),
            ("TRP & H&C", "available"),
        ],
        "pathway": [
            ("01", "Case Assessment", "Review the grounds of inadmissibility and available remedies."),
            ("02", "Legal Strategy", "Develop TRP, H&C, or rehabilitation strategy for your case."),
            ("03", "Application Preparation", "Compile legal arguments, supporting evidence, and letters."),
            ("04", "IRCC Submission", "File the inadmissibility remedy application with IRCC or CBSA."),
            ("05", "Decision", "Receive the officer's decision and plan next steps with TDOT."),
        ],
    },
    "provincial-nominee.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect x="25" y="45" width="150" height="110" rx="6" stroke="currentColor" stroke-width="3" stroke-opacity="0.2"/>
  <line x1="75" y1="45" x2="75" y2="155" stroke="currentColor" stroke-width="1.5" stroke-opacity="0.2"/>
  <line x1="125" y1="45" x2="125" y2="155" stroke="currentColor" stroke-width="1.5" stroke-opacity="0.2"/>
  <line x1="25" y1="95" x2="175" y2="95" stroke="currentColor" stroke-width="1.5" stroke-opacity="0.2"/>
  <line x1="25" y1="120" x2="175" y2="120" stroke="currentColor" stroke-width="1.5" stroke-opacity="0.15"/>
  <circle cx="105" cy="85" r="20" stroke="#C0272D" stroke-width="3"/>
  <circle cx="105" cy="85" r="7" fill="#C0272D"/>
  <line x1="105" y1="105" x2="105" y2="125" stroke="#C0272D" stroke-width="3" stroke-linecap="round"/>
</svg>""",
        "stats": [
            ("13", "PNP streams"),
            ("600+", "CRS boost possible"),
            ("PR in 6–18 mo", "typical"),
        ],
        "pathway": [
            ("01", "Province Selection", "Identify the province best matching your skills and goals."),
            ("02", "Stream Assessment", "Evaluate stream requirements and eligibility criteria."),
            ("03", "Expression of Interest", "Submit provincial EOI and wait for nomination invitation."),
            ("04", "Nomination", "Receive provincial nomination and gain 600 CRS points."),
            ("05", "Federal PR App", "Apply for permanent residence through Express Entry or paper-based."),
        ],
    },
    "visitor-visa.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <rect x="55" y="35" width="90" height="115" rx="8" stroke="currentColor" stroke-width="4"/>
  <rect x="65" y="50" width="70" height="55" rx="5" stroke="currentColor" stroke-width="2.5" fill="currentColor" fill-opacity="0.06"/>
  <line x1="65" y1="120" x2="135" y2="120" stroke="currentColor" stroke-width="2" stroke-opacity="0.4"/>
  <line x1="65" y1="132" x2="115" y2="132" stroke="currentColor" stroke-width="2" stroke-opacity="0.3"/>
  <circle cx="100" cy="77" r="18" stroke="#C0272D" stroke-width="2.5"/>
  <path d="M132 155 L150 148 Q162 144 164 152 Q166 160 155 163 L112 170 L95 162 L75 165 L80 155 L95 152 Z" fill="currentColor" fill-opacity="0.7"/>
  <path d="M112 155 L120 138 L128 142 L120 160" fill="currentColor" fill-opacity="0.5"/>
</svg>""",
        "stats": [
            ("2–8 wk", "processing"),
            ("Single & Multiple", "entry"),
            ("TRV & eTA", "both covered"),
        ],
        "pathway": [
            ("01", "Eligibility Review", "Assess your ties to home country and visit purpose."),
            ("02", "Document Prep", "Prepare invitation letters, financials, and itinerary."),
            ("03", "Online Application", "Submit TRV or eTA application through IRCC portal."),
            ("04", "Biometrics", "Complete biometrics enrollment at a VAC if required."),
            ("05", "Visa Stamped", "Receive visa stamp in passport or eTA confirmation by email."),
        ],
    },
    "citizenship.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <path d="M100 20 L112 60 L155 60 L120 85 L133 125 L100 100 L67 125 L80 85 L45 60 L88 60 Z" stroke="currentColor" stroke-width="3" fill="currentColor" fill-opacity="0.08"/>
  <path d="M100 35 L108 58 L133 58 L113 73 L121 96 L100 82 L79 96 L87 73 L67 58 L92 58 Z" fill="#C0272D" fill-opacity="0.85"/>
  <circle cx="55" cy="150" r="8" stroke="currentColor" stroke-width="2" stroke-opacity="0.5"/>
  <circle cx="100" cy="158" r="10" stroke="#C0272D" stroke-width="2.5"/>
  <circle cx="145" cy="150" r="8" stroke="currentColor" stroke-width="2" stroke-opacity="0.5"/>
  <path d="M60 170 Q100 175 140 170" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-opacity="0.4"/>
</svg>""",
        "stats": [
            ("3 yr", "physical presence"),
            ("1080 days", "required"),
            ("Language & Knowledge", "tested"),
        ],
        "pathway": [
            ("01", "Residency Verification", "Calculate physical presence days and confirm eligibility."),
            ("02", "Application Filed", "Submit citizenship application with tax and travel records."),
            ("03", "Test Scheduled", "Prepare for the knowledge test on Canadian history and values."),
            ("04", "Ceremony", "Attend the citizenship ceremony and take the oath."),
            ("05", "Passport Eligible", "Apply for your Canadian passport as a new citizen."),
        ],
    },
    "temporary-resident-permit.html": {
        "svg": """<svg viewBox="0 0 200 200" fill="none" xmlns="http://www.w3.org/2000/svg">
  <circle cx="95" cy="90" r="65" stroke="currentColor" stroke-width="4"/>
  <circle cx="95" cy="90" r="5" fill="currentColor"/>
  <line x1="95" y1="90" x2="95" y2="45" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
  <line x1="95" y1="90" x2="128" y2="105" stroke="currentColor" stroke-width="4" stroke-linecap="round"/>
  <line x1="95" y1="35" x2="95" y2="25" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
  <line x1="155" y1="90" x2="165" y2="90" stroke="currentColor" stroke-width="3" stroke-linecap="round"/>
  <circle cx="148" cy="160" r="18" stroke="#C0272D" stroke-width="3"/>
  <line x1="148" y1="142" x2="148" y2="125" stroke="#C0272D" stroke-width="3" stroke-linecap="round"/>
  <line x1="140" y1="125" x2="156" y2="125" stroke="#C0272D" stroke-width="3" stroke-linecap="round"/>
</svg>""",
        "stats": [
            ("Officer discretion", "based"),
            ("Up to 3 yr", "duration"),
            ("Criminal & Medical", "grounds"),
        ],
        "pathway": [
            ("01", "Case Review", "Assess the inadmissibility ground and TRP justification."),
            ("02", "Grounds Assessment", "Document compelling reasons for entry despite inadmissibility."),
            ("03", "TRP Application", "Prepare and submit the Temporary Resident Permit application."),
            ("04", "CBSA/IRCC Decision", "Officer reviews the application and weighs benefit vs risk."),
            ("05", "Entry Authorized", "Receive the TRP and enter Canada for the authorized period."),
        ],
    },
}


def build_svc_vis_band(svc_data):
    stats_html = ""
    for i, (num, label) in enumerate(svc_data["stats"]):
        delay_attr = ""
        if i == 1:
            delay_attr = ' data-delay="110"'
        elif i == 2:
            delay_attr = ' data-delay="220"'
        stats_html += f"""      <div class="svc-glance-item" data-anim="up"{delay_attr}>
        <span class="svc-glance-num">{num}</span>
        <span class="svc-glance-label">{label}</span>
      </div>
"""

    return f"""<div class="svc-vis-band">
  <div class="container svc-vis-inner">
    <div class="svc-vis-icon" aria-hidden="true">
      {svc_data["svg"]}
    </div>
    <div class="svc-glance-grid" data-stagger>
{stats_html}    </div>
  </div>
</div>"""


def build_svc_pathway(svc_data):
    steps_html = ""
    for num, title, desc in svc_data["pathway"]:
        steps_html += f"""  <div class="svc-pathway-step">
    <div class="svc-pathway-num">{num}</div>
    <h4>{title}</h4>
    <p>{desc}</p>
  </div>
"""
    return f"""<div class="svc-pathway" data-anim="up">
{steps_html}</div>"""


def insert_svc_graphics(html, filename):
    """Insert svc-vis-band and svc-pathway into service pages."""
    svc_data = SERVICE_DATA.get(filename)
    if not svc_data:
        return html

    # Skip if already inserted
    if 'svc-vis-band' in html:
        print(f"  [SKIP graphics already present]")
        return html

    vis_band = build_svc_vis_band(svc_data)
    pathway = build_svc_pathway(svc_data)

    # Insert svc-vis-band AFTER </section> of page-hero and BEFORE next <section class="section">
    # The page-hero closes with </section> then the content section opens
    # Pattern: find the closing of page-hero section, then the opening of content section

    # Strategy: find </section> followed (possibly with whitespace) by <section class="section">
    # and insert vis-band between them
    pattern = re.compile(
        r'(</section>)(\s*\n\s*)(<section class="section">)',
        re.DOTALL
    )

    def inserter(m):
        return m.group(1) + '\n' + vis_band + '\n' + m.group(2) + m.group(3)

    # Only replace first occurrence (after page-hero)
    html, count = pattern.subn(inserter, html, count=1)
    if count == 0:
        print(f"  [WARNING: could not find insertion point for svc-vis-band]")

    # Insert svc-pathway right after <article class="content-article">
    article_pattern = re.compile(r'(<article class="content-article">)')
    html, count2 = article_pattern.subn(
        r'\1\n' + pathway + '\n',
        html,
        count=1
    )
    if count2 == 0:
        print(f"  [WARNING: could not find <article class='content-article'>]")

    return html


# ─────────────────────────────────────────────
# MAIN PROCESSING
# ─────────────────────────────────────────────

def process_file(filepath, task1=True, task2=False, task3=False):
    filename = os.path.basename(filepath)
    print(f"Processing: {filepath}")

    with open(filepath, 'r', encoding='utf-8') as f:
        html = f.read()

    original = html

    if task1:
        html = remove_locations_nav(html)
        html = remove_locations_mobile(html)
        html = remove_locations_footer(html)

    if task2:
        if needs_footer_update(html):
            print(f"  [Task 2] Updating footer...")
            html = replace_old_footer(html)
        else:
            print(f"  [Task 2] Footer already updated, skipping pre-footer insert.")
            # Still need to standardize the footer content (locations removal already done)
            # but pre-footer is there. Just ensure footer is canonical.
            html = replace_old_footer(html)

    if task3:
        html = insert_svc_graphics(html, filename)

    if html != original:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(html)
        print(f"  -> Updated.")
    else:
        print(f"  -> No changes needed.")


# All HTML files
ALL_HTML = [
    f"{BASE}/index.html",
    f"{BASE}/about.html",
    f"{BASE}/contact.html",
    f"{BASE}/services/index.html",
    f"{BASE}/services/express-entry.html",
    f"{BASE}/services/study-permit.html",
    f"{BASE}/services/work-permit.html",
    f"{BASE}/services/family-sponsorship.html",
    f"{BASE}/services/business-visa.html",
    f"{BASE}/services/investor-visa.html",
    f"{BASE}/services/inadmissibility.html",
    f"{BASE}/services/provincial-nominee.html",
    f"{BASE}/services/visitor-visa.html",
    f"{BASE}/services/citizenship.html",
    f"{BASE}/services/temporary-resident-permit.html",
    f"{BASE}/blog/index.html",
    f"{BASE}/blog/express-entry-2025.html",
    f"{BASE}/blog/family-sponsorship-guide.html",
    f"{BASE}/blog/pr-process-guide.html",
    f"{BASE}/blog/study-permit-changes-2025.html",
    f"{BASE}/locations/toronto.html",
    f"{BASE}/locations/north-york.html",
    f"{BASE}/locations/mississauga.html",
    f"{BASE}/locations/brampton.html",
    f"{BASE}/locations/vaughan.html",
]

PAGES_NEED_FOOTER_UPDATE = [
    f"{BASE}/services/citizenship.html",
    f"{BASE}/services/express-entry.html",
    f"{BASE}/services/inadmissibility.html",
    f"{BASE}/services/provincial-nominee.html",
    f"{BASE}/services/temporary-resident-permit.html",
    f"{BASE}/services/visitor-visa.html",
    f"{BASE}/blog/index.html",
    f"{BASE}/blog/express-entry-2025.html",
    f"{BASE}/blog/family-sponsorship-guide.html",
    f"{BASE}/blog/pr-process-guide.html",
    f"{BASE}/blog/study-permit-changes-2025.html",
    f"{BASE}/locations/toronto.html",
    f"{BASE}/locations/north-york.html",
    f"{BASE}/locations/mississauga.html",
    f"{BASE}/locations/brampton.html",
    f"{BASE}/locations/vaughan.html",
]

SERVICE_PAGES = [
    f"{BASE}/services/express-entry.html",
    f"{BASE}/services/study-permit.html",
    f"{BASE}/services/work-permit.html",
    f"{BASE}/services/family-sponsorship.html",
    f"{BASE}/services/business-visa.html",
    f"{BASE}/services/investor-visa.html",
    f"{BASE}/services/inadmissibility.html",
    f"{BASE}/services/provincial-nominee.html",
    f"{BASE}/services/visitor-visa.html",
    f"{BASE}/services/citizenship.html",
    f"{BASE}/services/temporary-resident-permit.html",
]

print("=" * 60)
print("TASK 1: Remove Locations from all pages")
print("=" * 60)
for f in ALL_HTML:
    if os.path.exists(f):
        process_file(f, task1=True, task2=False, task3=False)
    else:
        print(f"MISSING: {f}")

print()
print("=" * 60)
print("TASK 2: Update old footers")
print("=" * 60)
for f in PAGES_NEED_FOOTER_UPDATE:
    if os.path.exists(f):
        process_file(f, task1=False, task2=True, task3=False)
    else:
        print(f"MISSING: {f}")

print()
print("=" * 60)
print("TASK 3: Add service graphics")
print("=" * 60)
for f in SERVICE_PAGES:
    if os.path.exists(f):
        process_file(f, task1=False, task2=False, task3=True)
    else:
        print(f"MISSING: {f}")

print()
print("All done!")
