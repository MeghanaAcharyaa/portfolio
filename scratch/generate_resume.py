from reportlab.lib import colors
from reportlab.lib.enums import TA_CENTER, TA_LEFT
from reportlab.lib.pagesizes import A4
from reportlab.lib.styles import ParagraphStyle, getSampleStyleSheet
from reportlab.lib.units import inch
from reportlab.platypus import SimpleDocTemplate, Paragraph, Spacer, Table, TableStyle, HRFlowable, KeepTogether

OUTPUTS = [
    r"c:\xampp\htdocs\portfolio\public\Meghana_Acharya_Resume_2026.pdf",
    r"c:\xampp\htdocs\portfolio\frontend_version\assets\Meghana_Acharya_Resume_2026.pdf",
]

name = "MEGHANA ACHARYA"
phone = "+91 9900459722"
email = "meghanaashok.cse@gmail.com"
location = "Pethri Udupi, 576215"
linkedin = "https://www.linkedin.com/in/meghana-acharya-a09548289"
github = "https://github.com/MeghanaAcharyaa"

about_text = (
    "A fresher in web development with high motivation and interest in developing helpful and user-friendly websites. "
    "Always eager to learn new technologies, enhance my skills, and gain experience in real-world web development projects."
)

skills = [
    ("Web Technologies", "HTML, CSS, JavaScript"),
    ("Backend / Frameworks", "PHP, MERN Stack"),
    ("Databases", "SQL, MongoDB"),
    ("Tools", "Visual Studio Code, Command Prompt, XAMPP"),
]

education = [
    ("Srinivas University Institute of Engineering and Technology, Mangalore", "2022-2026", "B.Tech: Computer Science and Engineering"),
    ("S.M.S Pre-University College, Brahmavara", "2021-2022", "PU: Physics, Chemistry, Mathematics, Biology"),
    ("S.M.S English Medium School, Brahmavara", "2020", "SSLC: Central Board of Secondary Education"),
]

projects = [
    ("Hotel-Management Website-Using SQL", "March 2026"),
    ("Personal Portfolio Website", "2026"),
]

styles = getSampleStyleSheet()
styles.add(ParagraphStyle(
    name="ResumeName",
    parent=styles["Title"],
    fontName="Times-Bold",
    fontSize=24,
    leading=26,
    alignment=TA_CENTER,
    spaceAfter=6,
))
styles.add(ParagraphStyle(
    name="Contact",
    parent=styles["BodyText"],
    fontName="Times-Roman",
    fontSize=10.2,
    leading=12,
    alignment=TA_CENTER,
    spaceAfter=2,
))
styles.add(ParagraphStyle(
    name="Section",
    parent=styles["Heading2"],
    fontName="Times-Bold",
    fontSize=14,
    leading=16,
    textColor=colors.black,
    spaceBefore=6,
    spaceAfter=4,
))
styles.add(ParagraphStyle(
    name="Body",
    parent=styles["BodyText"],
    fontName="Times-Roman",
    fontSize=11,
    leading=14,
    alignment=TA_LEFT,
    spaceAfter=4,
))
styles.add(ParagraphStyle(
    name="Small",
    parent=styles["BodyText"],
    fontName="Times-Roman",
    fontSize=9.5,
    leading=11.5,
    alignment=TA_LEFT,
    spaceAfter=2,
))
styles.add(ParagraphStyle(
    name="SkillLabel",
    parent=styles["BodyText"],
    fontName="Times-Bold",
    fontSize=11,
    leading=13,
))
styles.add(ParagraphStyle(
    name="EduTitle",
    parent=styles["BodyText"],
    fontName="Times-Bold",
    fontSize=10.5,
    leading=12.5,
))
styles.add(ParagraphStyle(
    name="EduRight",
    parent=styles["BodyText"],
    fontName="Times-Bold",
    fontSize=10.5,
    leading=12.5,
    alignment=TA_CENTER,
))


def build_story():
    story = []
    story.append(Paragraph(name, styles["ResumeName"]))
    contact_line = f"&#128222; {phone} &nbsp;&nbsp;&nbsp; &#9993; {email} &nbsp;&nbsp;&nbsp; &#9679; {location}"
    story.append(Paragraph(contact_line, styles["Contact"]))
    story.append(Paragraph(linkedin, styles["Contact"]))
    story.append(Paragraph(github, styles["Contact"]))
    story.append(Spacer(1, 6))
    story.append(HRFlowable(width="100%", thickness=1, color=colors.HexColor("#555555"), spaceBefore=0, spaceAfter=8))

    story.append(Paragraph("ABOUT ME", styles["Section"]))
    story.append(Paragraph(about_text, styles["Body"]))

    story.append(Paragraph("TECHNICAL SKILLS", styles["Section"]))
    for label, value in skills:
        story.append(Paragraph(f"&#8226; <b>{label}:</b> {value}", styles["Body"]))

    story.append(Paragraph("EDUCATION", styles["Section"]))
    edu_rows = []
    for school, year, detail in education:
        edu_rows.append([
            Paragraph(school, styles["EduTitle"]),
            Paragraph(year, styles["EduRight"]),
        ])
        edu_rows.append([
            Paragraph(detail, styles["Body"]),
            Paragraph("", styles["Body"]),
        ])
    edu_table = Table(edu_rows, colWidths=[4.9 * inch, 1.3 * inch], hAlign="LEFT")
    edu_table.setStyle(TableStyle([
        ("VALIGN", (0, 0), (-1, -1), "TOP"),
        ("LEFTPADDING", (0, 0), (-1, -1), 0),
        ("RIGHTPADDING", (0, 0), (-1, -1), 0),
        ("TOPPADDING", (0, 0), (-1, -1), 1),
        ("BOTTOMPADDING", (0, 0), (-1, -1), 4),
    ]))
    story.append(edu_table)

    story.append(Paragraph("PROJECTS", styles["Section"]))
    project_rows = []
    for title, when in projects:
        project_rows.append([
            Paragraph(title, styles["EduTitle"]),
            Paragraph(when, styles["EduRight"]),
        ])
    project_table = Table(project_rows, colWidths=[4.9 * inch, 1.3 * inch], hAlign="LEFT")
    project_table.setStyle(TableStyle([
        ("VALIGN", (0, 0), (-1, -1), "TOP"),
        ("LEFTPADDING", (0, 0), (-1, -1), 0),
        ("RIGHTPADDING", (0, 0), (-1, -1), 0),
        ("TOPPADDING", (0, 0), (-1, -1), 1),
        ("BOTTOMPADDING", (0, 0), (-1, -1), 4),
    ]))
    story.append(project_table)

    story.append(Spacer(1, 2))
    story.append(Paragraph("<b>Selected Highlight:</b> Built a hotel management website focused on SQL-backed data handling and practical user workflows.", styles["Small"]))
    return story


def write_pdf(path):
    doc = SimpleDocTemplate(
        path,
        pagesize=A4,
        leftMargin=0.55 * inch,
        rightMargin=0.55 * inch,
        topMargin=0.45 * inch,
        bottomMargin=0.45 * inch,
        title="Meghana Acharya Resume",
        author="Meghana Acharya",
    )
    story = build_story()
    doc.build(story)


for target in OUTPUTS:
    write_pdf(target)
    print(f"Wrote {target}")
